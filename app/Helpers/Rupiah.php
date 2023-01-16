<?php 
     function reverseRupiah($angka) {
        $deleteRp =str_replace('Rp. ', '',$angka);
        $result = str_replace('.', '',$deleteRp);
        return $result;
    }
?>