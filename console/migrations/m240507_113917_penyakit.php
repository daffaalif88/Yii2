<?php

use yii\db\Migration;

/**
 * Class m240507_113917_penyakit
 */
class m240507_113917_penyakit extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%penyakit}}', [
            'id' => $this->primaryKey(), // Tipe data integer dengan opsi AUTO_INCREMENT
            'nama_penyakit' => $this->string(255)->notNull(),
            'deskripsi_penyakit' => $this->string(255)->notNull(),
        ]);

        $this->batchInsert('{{%penyakit}}', ['nama_penyakit', 'deskripsi_penyakit'], [
            ['Flu', 'Infeksi virus yang menyerang sistem pernapasan'],
            ['Batuk', 'Gangguan pernapasan yang disertai dengan suara kasar saat pernapasan'],
            ['Demam', 'Kenaikan suhu tubuh di atas normal'],
            ['Migrain', 'Sakit kepala yang parah dan berdenyut'],
            ['Diabetes', 'Penyakit yang menyebabkan kadar gula darah tinggi'],
            ['Hipertensi', 'Tekanan darah tinggi'],
            ['Asma', 'Gangguan pernapasan kronis yang menyebabkan penyempitan saluran napas'],
            ['Bronkitis', 'Radang pada saluran pernapasan'],
            ['Tipes', 'Penyakit bakteri yang menyebabkan demam dan gejala gastrointestinal'],
            ['Malaria', 'Penyakit yang disebabkan oleh parasit yang ditularkan oleh nyamuk'],
            ['Kanker', 'Penyakit yang ditandai dengan pertumbuhan sel-sel ganas yang tidak terkendali'],
            ['HIV/AIDS', 'Penyakit menular seksual yang menyerang sistem kekebalan tubuh'],
            ['Hepatitis', 'Radang hati yang dapat disebabkan oleh infeksi virus, alkohol, atau obat-obatan'],
            ['Infeksi Saluran Kemih (ISK)', 'Infeksi pada saluran kemih'],
            ['Pneumonia', 'Radang pada paru-paru'],
            ['Gastritis', 'Radang pada lambung'],
            ['Maag', 'Gangguan pencernaan yang disebabkan oleh peningkatan asam lambung'],
            ['TBC (Tuberkulosis)', 'Penyakit bakteri yang menyerang paru-paru'],
            ['Penyakit Jantung Koroner', 'Penyakit jantung yang disebabkan oleh penyumbatan pembuluh darah'],
            ['Stroke', 'Kerusakan pada otak akibat penyumbatan atau pecahnya pembuluh darah'],
        ]);
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%penyakit}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240507_113917_penyakit cannot be reverted.\n";

        return false;
    }
    */
}
