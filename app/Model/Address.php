<?php
App::uses('AppModel', 'Model');
/**
 * Address Model
 *
 */
class Address extends AppModel {

	public function loadCsv($fileName) {

        $this->begin();
        try {
		    $this->deleteAll('1=1', false); //テーブル内全削除
            $csvData = file($fileName, FILE_SKIP_EMPTY_LINES | FILE_SKIP_EMPTY_LINES); // 空行読み飛ばし&配列の要素最後に改行を追加しない
            foreach($csvData as $line) {
                $line = mb_convert_encoding($line, 'UTF-8');
                $record = str_getcsv($line, ",", '"'); // 囲み文字が入らないよう修正
                $data = array(
				    'cd' => $record[0],
			    	'postnum' => $record[2],
				    'address1' => $record[6],
			    	'address2' => $record[7],
				    'address3' => $record[8],
			    );
		    	$this->create($data);
                $this->save();
            }
		    $this->commit();
	    } catch (Exception $e) {
            $this->rollback();
            var_dump('errorです');
	    }
	}

    public $validate = array(
        'csvFile' => array('rule' => 'notEmpty'),
        'postnum' => array(
            'rule' => array('notEmpty', array('maxLength', 7)),
            'message' => '7文字以内で入力してください。'
        )
    );

}
