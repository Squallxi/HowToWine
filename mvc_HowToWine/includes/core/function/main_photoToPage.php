<?php
    function setIdByPage($page){
        switch($page){
            case'index':{
                print'main_photoHome';
                break;
            }
            case 'oenologie':{
                print'main_photoOeno';
                break;
            }
            case'viticulture':{
                print'main_photoViti';
                break;
            }
            case'degustation':{
                print'main_photoDegust';
                break;
            }
            case'listExo':{
                print'main_photoExo';
                break;
            }
            default:{
                print'main_photoHome';
            }
        }
    }