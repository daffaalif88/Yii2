<?php

use yii\db\Migration;

/**
 * Class m240507_112036_pasien
 */
class m240507_112036_pasien extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pasien}}', [
            'id' => $this->primaryKey(), // Tipe data integer dengan opsi AUTO_INCREMENT
            'nik' => $this->string()->notNull(),
            'nama_pasien' => $this->string(255)->notNull(),
            'tanggal_lahir' => $this->date()->notNull(),
            'jenis_kelamin' => $this->string(1)->notNull()->check("jenis_kelamin IN ('L', 'P')"),
        ]);

        $this->batchInsert('{{%pasien}}', ['nik', 'nama_pasien', 'tanggal_lahir', 'jenis_kelamin'], [
            ['1245432345', 'Daffa', '2000-02-01', 'L'],
            ['3456754345', 'Nur', '2000-02-01', 'P'],
            ['6786567890', 'Alif', '2000-02-01', 'L'],
            ['7654346789', 'Muhammad', '2000-02-01', 'L'],
            ['0656789556', 'Herman', '2000-02-01', 'L'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pasien}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240507_112036_pasien cannot be reverted.\n";

        return false;
    }
    */
}
