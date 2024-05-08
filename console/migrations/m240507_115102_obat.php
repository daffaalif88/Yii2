<?php

use yii\db\Migration;

/**
 * Class m240507_115102_obat
 */
class m240507_115102_obat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%obat}}', [
            'id' => $this->primaryKey(),
            'nama_obat' => $this->string()->notNull(),
            'id_kategori' => $this->integer()->notNull(),
            'harga_obat' => $this->integer()->notNull(),
            'stok_obat' => $this->integer()->notNull(),
        ]);

        $this->batchInsert('obat', ['nama_obat', 'id_kategori', 'harga_obat', 'stok_obat'], [
            ['Paracetamol', '1', 10000, 80],
            ['Amoxicillin', '2', 15000, 50],
            ['Ibuprofen', '3', 12000, 60],
            ['Omeprazole', '4', 20000, 40],
            ['Loratadine', '5', 18000, 70],
            ['Cetirizine', '1', 16000, 90],
            ['Dexamethasone', '2', 25000, 30],
            ['Ranitidine', '3', 22000, 50],
            ['Metformin', '4', 23000, 45],
            ['Diazepam', '5', 30000, 35],
            ['Tramadol', '1', 28000, 55],
            ['Atorvastatin', '2', 35000, 40],
            ['Simvastatin', '3', 32000, 60],
            ['Cefixime', '4', 28000, 70],
            ['Ceftriaxone', '5', 40000, 25],
            ['Azithromycin', '1', 38000, 45],
            ['Clarithromycin', '2', 36000, 65],
            ['Doxycycline', '3', 42000, 30],
            ['Levofloxacin', '4', 44000, 50],
            ['Naproxen', '5', 40000, 35],
        ]);

        // creates index for column `id_kategori`
        $this->createIndex(
            '{{%idx-obat-id_kategori}}',
            '{{%obat}}',
            'id_kategori'
        );

        // add foreign key for table `pasien`
        $this->addForeignKey(
            '{{%fk-obat-id_kategori}}',
            '{{%obat}}',
            'id_kategori',
            '{{%kategori_obat}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drop foreign key for table `pasien`
        $this->dropForeignKey(
            '{{%fk-obat-kategori_obat}}',
            '{{%obat}}'
        );

        // drop index for column `kategori_obat`
        $this->dropIndex(
            '{{%idx-obat-kategori_obat}}',
            '{{%obat}}'
        );

        $this->dropTable('{{%obat}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240507_115102_obat cannot be reverted.\n";

        return false;
    }
    */
}
