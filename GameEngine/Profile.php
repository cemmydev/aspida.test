<?php
###############################  E    N    D   ##################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Developed by:  Brainiac & Wolfcruel                                        ##
##  License:       BrainianZ Project                                        ##
##  Copyright:     BrainianZ © 2011-2014. Skype brainiac.brainiac         ##
##                                                                             ##
#################################################################################
class Profile {

	public function procProfile($post) {
		if(isset($post['ft'])) {
			switch($post['ft']) {
				case "p1":
				$this->updateProfile($post);
				break;
				case "p3":
				$this->updateAccount($post);
				break;
			}
		}

	}

	public function procSpecial($get) {
		if(isset($get['e'])) {
            switch($get['e']) {
				case 2:
				$this->removeSitter($get);
				break;

                case 3:
                    $this->removeMeSit($get);
                    break;
			}
		}
	}

    private function updateProfile($post) {
        global $database,$session,$form;
		$validate = true;
		if($post['country']==-1){
			$validate=false;
			$form->addError("country","Invalid country selected");
		}
		
		if($validate){
			$birthday = $database->filterIntValue($database->filterVar($post['jahr'])).'-'.$database->filterIntValue($database->filterVar($post['monat'])).'-'.$database->filterIntValue($database->filterVar($post['tag']));
			$database->submitProfile(
				$database->filterIntValue($database->filterVar($database->RemoveXSS($session->uid))),
				$database->RemoveXSS($post['mw']),
				$database->RemoveXSS($post['country']),
				$database->RemoveXSS($birthday),
				$database->RemoveXSS($post['be1']),
				$database->RemoveXSS($post['be2']));
			foreach($session->vvillages as $vil){
				if($database->RemoveXSS($vil['name'])!=$post['dname'.$vil['wref']]){
					$post['name']=$database->RemoveXSS($post['name'.$vil['wref']]);
					$database->setVillageName($vil['wref'],$database->RemoveXSS($post['dname'.$vil['wref']]));
				}

			}
		}
		$_SESSION['errorarray'] = $form->getErrors();

        //header("Location: ?uid=".$post['uid']);
		header("Location: ?s=1");
    }


	private function updateAccount($post) {
		global $database,$session,$form;
		
        if($post['pw2'] !== "" && $post['pw3'] !== ""){
			if($post['pw2'] === $post['pw3']) {
				if($database->login($session->username,$post['pw1'])) {
					$database->updateUserField($session->uid,"password",md5($post['pw2'].mb_convert_case($session->username,MB_CASE_LOWER,"UTF-8")),1);
				}
				else {
					$form->addError("pw",LOGIN_PW_ERROR);
				}
			}
			else {
				$form->addError("pw",PASS_MISMATCH);
			}
        }
		if($post['del'] == 1){
			if(md5($post['del_pw'].mb_convert_case($session->username,MB_CASE_LOWER,"UTF-8")) == $session->password) {
					$ref=$database->setDeleting($session->uid,0);
					$database->insertQueue($ref,10,time(),(time()+86400),$session->uid);
					header("Location: spieler.php?s=3");
			}
			else {
				$form->addError("del",PASS_MISMATCH);
			}
		}

		if($post['v1'] != "") {
			$sitid = $database->getUserField($post['v1'],"id",1);
             if(!empty($sitid)){
				$sitnum = $database->getSitUid($sitid);
				$database->addpalevo(0,$sitnum,9);
				if($sitnum>=2  || $sitid == $session->uid) {
					$form->addError("sit",SIT_ERROR);
				}
				else {
					//if($sitid!=$session->refer){
						if($session->sit1 == 0) {
							$database->updateUserField($post['uid'],"sit1",$sitid,1);
						}
						else if($session->sit2 == 0) {
							$database->updateUserField($post['uid'],"sit2",$sitid,1);
						}
					//}
				}
			}
		}
        if($post['v2'] != "") {
            $sitid = $database->getUserField($post['v2'],"id",1);
            if(!empty($sitid)){
                $sitnum = $database->getSitUid($sitid);
                $database->addpalevo(0,$sitnum,9);

                if($sitid == $session->sit1 || $sitid == $session->sit2 || $sitnum>=2 || $sitid == $session->uid) {
                    $form->addError("sit",SIT_ERROR);
                }
                else {
                    if($sitid!=$session->refer){
                        if($session->sit1 == 0) {
                            $database->updateUserField($post['uid'],"sit1",$sitid,1);
                        }
                        else if($session->sit2 == 0) {
                            $database->updateUserField($post['uid'],"sit2",$sitid,1);
                        }
                    }
                }
            }
        }
        foreach(array(1,2,3,4,5,6,21,22,23,24,25,26) as $S){
            if(!isset($post['s'.$S])){
                $post['s'.$S]=0;
            }else{$post['s'.$S]=1;}
        }
       //обновляем права замящего
        $database->UpdateRights($session->uid,$post);
       if($post)
		$_SESSION['errorarray'] = $form->getErrors();
		header("Location: options.php");
exit();
	}

	private function removeSitter($get) { //снять зама с меня
		global $database,$session;
		if($get['a'] == $session->checker) {
			if($session->{'sit'.$get['type']}) {
				$database->updateUserField($session->uid,"sit".$get['type'],0);
			}
			$session->changeChecker();
		}
        $session->{'sit'.$get['type']}=0;

	}

	public function cancelDeleting() {
		global $database,$session;
		$uid=$session->uid;
		$database->setDeleting($uid,1);
        $database->DeleteQueue("`if1`='".$uid."' AND `type`='10'");
        header("Location: options.php");
        exit;
	}

	private function removeMeSit($get) { // снять себя с замства
		global $database,$session;

		if($get['a'] == $session->checker) {

			$database->removeMeSit($get['owner'],$session->uid);
			$session->changeChecker();
		}
		header("Location: options.php");
        exit;

	}
};
$profile = new Profile;
