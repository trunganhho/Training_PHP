<?php 
function checkIfExist($targetfile){
    if (file_exists($targetfile)) {
        $imageFileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));
        $target_name = basename($targetfile, "." . $imageFileType);
        $folder = str_replace(basename($targetfile), "", $targetfile);
        $range = 0;

        $final_target_file = null;
        do{
            $range += 1;
            $final_target_file = $folder . $target_name . rand($range,$range * 10) . "." . $imageFileType;
        }
        while(file_exists($final_target_file));
        return $final_target_file;
    }
    else return $targetfile;
}
?>