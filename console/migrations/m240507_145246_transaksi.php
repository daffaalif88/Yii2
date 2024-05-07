<?php

use yii\db\Migration;

/**
 * Class m240507_145246_transaksi
 */
class m240507_145246_transaksi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transaksi}}', [
            'id' => $this->primaryKey(),
            'id_pasien' => $this->integer()->notNull(),
            'id_dokter' => $this->integer()->notNull(),
            'id_jadwal_praktik' => $this->integer()->notNull(),
            'tanggal_transaksi' => $this->date()->notNull(),
            'total_harga' => $this->integer()->notNull(),
            'status' => $this->string()->notNull(),
        ]);

        $this->createIndex(
            '{{%idx-transaksi-id_pasien}}',
            '{{%transaksi}}',
            'id_pasien'
        );

        $this->createIndex(
            '{{%idx-transaksi-id_dokter}}',
            '{{%transaksi}}',
            'id_dokter'
        );

        $this->createIndex(
            '{{%idx-transaksi-id_jadwal_praktik}}',
            '{{%transaksi}}',
            'id_jadwal_praktik'
        );

        // add foreign key for table `pasien`
        $this->addForeignKey(
            '{{%fk-transaksi-id_pasien}}',
            '{{%transaksi}}',
            'id_pasien',
            '{{%pasien}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            '{{%fk-transaksi-id_dokter}}',
            '{{%transaksi}}',
            'id_dokter',
            '{{%dokter}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            '{{%fk-transaksi-id_jadwal_praktik}}',
            '{{%transaksi}}',
            'id_jadwal_praktik',
            '{{%jadwal_praktik}}',
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
            '{{%fk-transaksi-id_pasien}}',
            '{{%transaksi}}'
        );

        // drop index for column `id_pasien`
        $this->dropIndex(
            '{{%idx-transaksi-id_pasien}}',
            '{{%transaksi}}'
        );

        // drop foreign key for table `pasien`
        $this->dropForeignKey(
            '{{%fk-transaksi-id_dokter}}',
            '{{%transaksi}}'
        );

        // drop index for column `id_dokter`
        $this->dropIndex(
            '{{%idx-transaksi-id_dokter}}',
            '{{%transaksi}}'
        );

        // drop foreign key for table `pasien`
        $this->dropForeignKey(
            '{{%fk-transaksi-id_jadwal_praktik}}',
            '{{%transaksi}}'
        );

        // drop index for column `id_jadwal_praktik`
        $this->dropIndex(
            '{{%idx-transaksi-id_jadwal_praktik}}',
            '{{%transaksi}}'
        );

        $this->dropTable('{{%transaksi}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240507_145246_transaksi cannot be reverted.\n";

        return false;
    }
    */
}
