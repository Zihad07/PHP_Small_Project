
<?php

define('DB_NAME',"C:\\Users\\zzzzz\\Desktop\\PHP_SmallProject\\CRUD_plain_text_file\\data\\db.txt");

function seed(){
    $data = array(
        array(
            'id' => 1,
            'fname' => 'Nahid',
            'lname' => 'Ahmed',
            'roll' => '22'
        ),
        array(
            'id' => 2,
            'fname' => 'Akash',
            'lname' => 'Ahmed',
            'roll' => '12'
        ),
        array(
            'id' => 3,
            'fname' => 'Shuvo',
            'lname' => 'Ahmed',
            'roll' => '10'
        ),
        array(
            'id' => 4,
            'fname' => "Saraa",
            'lname' => 'Chowduroy',
            'roll' => '15'
        ),
    );

    $serializeData = serialize($data);

    file_put_contents(DB_NAME,$serializeData,LOCK_EX);
}

function generateReport(){

    $serializeData = file_get_contents(DB_NAME);
    $students = unserialize($serializeData);

    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Roll</th>
            <th width="25%">Action</th>
        </tr>

        <?php
        foreach($students as $student){
            ?>

            <tr>
                <td><?php printf("%s %s",$student['fname'],$student['lname']); ?></td>
                <td><?php printf("%s",$student['roll']); ?></td>
                <td><?php printf('<a href="index.php?task=edit&id=%s">Edit</a> | <a class="delete" href="index.php?task=delete&id=%s">Delete</a>',$student['id'],$student['id']); ?></td>
            </tr>
            <?

        }?> 
    </table>

<?php   
}

function addStudent( $fname, $lname,$roll){
    $found = false;
    $serializeData = file_get_contents(DB_NAME);
    $students = unserialize($serializeData);

    foreach($students as $_student){
        if($_student['roll'] == $roll){
            $found = true;
            break;
        }
    }

    if(!$found){
        $newId = getNewId($students);
        // new student array
        $student = array(
            'id' => $newId,
            'fname' => $fname,
            'lname' => $lname,
            'roll' => $roll
        );

        // insert in students array
        array_push($students,$student);
        $serializeData = serialize($students);
        file_put_contents(DB_NAME,$serializeData);

        return true;
    }

    return false;
}

function getStudent($id){
    $serialziedData = file_get_contents( DB_NAME );
    $students       = unserialize( $serialziedData );
    foreach ( $students as $student ) {
        if ( $student['id'] == $id ) {
            return $student;
        }
    }

    return false;
}

function updateStudent($id,$fname,$lname,$roll){
    $found = false;
    $serializeData = file_get_contents(DB_NAME);
    $students = unserialize($serializeData);

    foreach($students as $student){
        // for duplicate value input
        if($student['roll'] == $roll && $student['id'] != $id){
            $found = true;
            break;
        }
    }

    if(!$found){
        $students[$id-1]['fname'] =$fname;
        $students[$id-1]['lname'] =$lname;
        $students[$id-1]['roll'] =$roll;
        
        $serializeData = serialize($students);
        file_put_contents(DB_NAME,$serializeData,LOCK_EX);
        
        return true;
    }

    return false;

}


function deleteStudent($id){

    // unserialize
    $serializeData = file_get_contents(DB_NAME);
    $students = unserialize($serializeData);

    unset($students[$id-1]);

    // serialize
    $serializeData = serialize($students);
    file_put_contents(DB_NAME,$serializeData,LOCK_EX);
}

function printRaw(){
     // unserialize
     $serializeData = file_get_contents(DB_NAME);
     $students = unserialize($serializeData);
     print_r($students);
 
}

// get new ID

function getNewId($students){
    $maxId = max(array_column($students,'id'));
    return $maxId + 1;
}



