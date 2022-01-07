<?php
class Map
{

    public function scramble($priority, $classStudentFK)
    {
        global $pdo;
        $array = array();
        $i = 0;
        $aux = 0;
        $sql = $pdo->prepare("SELECT students.student FROM students JOIN classRoom ON classRoom.id = students.classStudentFK WHERE students.classStudentFK = :classStudentFK AND students.priority = :priority");
        $sql->bindValue('classStudentFK', $classStudentFK);
        $sql->bindValue('priority', $priority);
        $sql->execute();

        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $array[$i] = $row['student'];
            $i++;
        }
        $size =  sizeof($array);

        for ($i = 0; $i < $size; $i++) {

            $r = rand(1, $size);

            for ($j = 0; $j < $size - 1; $j++) {

                if ($j < $r) {

                    $aux = $array[$j];

                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $aux;
                }
            }
        }
        return $array;
    }

    public function getMap($classStudentFK)
    {
        global $pdo;
        $array = array();
        $u = new Map();
        $priority1 = $u->scramble(1, $classStudentFK);
        $priority2 = $u->scramble(2, $classStudentFK);
        $priority3 = $u->scramble(3, $classStudentFK);
        $priority4 = $u->scramble(4, $classStudentFK);
        $priority5 = $u->scramble(5, $classStudentFK);
        $sizeP1 = sizeof($priority1);
        $sizeP2 = sizeof($priority2);
        $sizeP3 = sizeof($priority3);
        $sizeP4 = sizeof($priority4);
        $sizeP5 = sizeof($priority5);

        $qtdL = 1;
        $countP1 = 0;
        $countP2 = 0;
        $countP3 = 0;
        $countP4 = 0;
        $countP5 = 0;
        $i = 1;
        $sql = $pdo->prepare("SELECT students.student, classRoom.classSize, classRoom.chairWidth, classRoom.chairLength FROM students JOIN classRoom ON classRoom.id = students.classStudentFK WHERE students.classStudentFK = :classStudentFK");
        $sql->bindValue('classStudentFK', $classStudentFK);
        $sql->execute();
        $array = $sql->fetch(PDO::FETCH_ASSOC);
        $chairLength = $array['chairLength'];
        $chairWidth = $array['chairWidth'];
        $classSize = $array['classSize'];
        for ($i = 1; $i <= $classSize; $i++) {
            $arrayClass[$i] = 'vazio';
        }


        for ($i = 0; $i < $sizeP1; $i++) {

            for ($j = 1; $j <= $classSize; $j++) {
                if ($arrayClass[$j] == 'vazio' && $countP1 < $sizeP1) {

                    $arrayClass[$j] = $priority1[$i];
                    $countP1++;
                    break;
                }
            }
        }
        if ($arrayClass[1] != 'vazio') {
            $qtdL = $qtdL + $chairWidth;
        }
        for ($i = 0; $i < $sizeP2; $i++) {

            for ($j = 1; $j <= $classSize; $j++) {
                if ($j % $chairWidth == 0 && $arrayClass[$j] == 'vazio' && $countP2 < $sizeP2) {

                    $arrayClass[$j] = $priority2[$i];
                    $countP2++;
                    break;
                }
                if ($j == $qtdL && $arrayClass[$j] == 'vazio' && $countP2 < $sizeP2) {

                    $arrayClass[$j] = $priority2[$i];
                    $qtdL = $qtdL + $chairWidth;
                    $countP2++;
                    break;
                }
            }
        }
        $qtdL = 1;
        for ($j = 1; $j < $classSize; $j++) {
            if ($arrayClass[$j] == 'vazio' && $j % $chairWidth != 0) {

                $q = $j / $chairWidth;
                $whole = (int) $q;
                $qtdL = $qtdL + $chairWidth * $whole;
                break;
            }
        }

        for ($i = 0; $i < $sizeP3; $i++) {


            for ($j = 1; $j <= $classSize; $j++) {
                if ($j % $chairWidth == 0 && $arrayClass[$j] == 'vazio' && $countP3 < $sizeP3) {

                    $arrayClass[$j] = $priority3[$i];
                    $countP3++;
                    break;
                }
                if ($j == $qtdL && $arrayClass[$j] == 'vazio' && $countP3 < $sizeP3) {

                    $arrayClass[$j] = $priority3[$i];

                    $countP3++;
                    break;
                }
                if ($j > $qtdL && $j < ($qtdL + ($chairWidth - 1)) && $countP3 < $sizeP3 && $arrayClass[$j] == 'vazio') {
                    if ($j == $qtdL + $chairWidth - 2) {
                        $qtdL = $qtdL + $chairWidth;
                    }

                    $arrayClass[$j] = $priority3[$i];
                    $countP3++;
                    break;
                }
            }
        }
        $qtdL = 1;
        for ($j = 1; $j <= $classSize; $j++) {
            if ($arrayClass[$j] == 'vazio' && $j % $chairWidth != 0) {

                $q = $j / $chairWidth;
                $whole = (int) $q;
                $qtdL = $qtdL + $chairWidth * $whole;
                break;
            }
        }

        for ($i = 0; $i < $sizeP4; $i++) {

            for ($j = 1; $j <= $classSize; $j++) {

                if ($j % $chairWidth == 0 && $arrayClass[$j] == 'vazio' && $countP4 < $sizeP4) {


                    $arrayClass[$j] = $priority4[$i];
                    $countP4++;
                    break;
                }
                if ($j == $qtdL && $arrayClass[$j] == 'vazio' && $countP4 < $sizeP4) {

                    $arrayClass[$j] = $priority4[$i];

                    $countP4++;
                    break;
                }
                if ($j > $qtdL && $j < ($qtdL + ($chairWidth - 1)) && $countP4 < $sizeP4 && $arrayClass[$j] == 'vazio') {
                    if ($j == $qtdL + $chairWidth - 2) {

                        $qtdL = $qtdL + $chairWidth;
                    }

                    $arrayClass[$j] = $priority4[$i];
                    $countP4++;
                    break;
                }
            }
        }

        for ($i = $countP2 + 1; $i < $sizeP2; $i++) {
            for ($j = 1; $j <= $classSize; $j++) {

                if ($arrayClass[$j] == 'vazio' && $countP2 < $sizeP2) {
                    $arrayClass[$j] = $priority2[$i];
                    $countP2++;
                    break;
                }
            }
        }
        for ($i = 0; $i < $sizeP5; $i++) {
            for ($j = 1; $j <= $classSize; $j++) {

                if ($arrayClass[$j] == 'vazio' && $countP5 < $sizeP5) {
                    $arrayClass[$j] = $priority5[$i];
                    $countP5++;
                    break;
                }
            }
        }
        return $arrayClass;
    }

    public function implodeArray($arrayClass)
    {

        $string = implode(', ', $arrayClass);
        return $string;
    }

    public function createMap($map, $userFK, $classMapFK)
    {
        global $pdo;
        $sql = $pdo->prepare("INSERT INTO map ( map, userFK, classMapFK)
        VALUES ( '$map', '$userFK', '$classMapFK')");
        $sql->execute();
    }

    public function explodeString($string)
    {
        $arrayClass = explode(', ', $string);
        $j = 1;
        for ($i = 0; $i < count($arrayClass); $i++) {
            $map[$j] = $arrayClass[$i];
            $j++;
        }
        return $map;
    }

    public function toString($userFK)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT map.idMap, classRoom.class, map.classMapFK, map.map, classRoom.id FROM `map` JOIN `classRoom` ON classRoom.id = map.classMapFK WHERE map.userFK = :userFk");
        $sql->bindValue('userFk', $userFK);
        $sql->execute();

        return $sql;
    }

    public function deleteMap($idMap)
    {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM map WHERE idMap = :idMap");
        $sql->bindValue('idMap', $idMap);
        $sql->execute();
    }

    public function changeStudent($map, $student1, $student2)
    {
        $aux = $map[$student1];
        $map[$student1] = $map[$student2];
        $map[$student2] = $aux;

        return $map;
    }
}
