<?php

class Brand {
    // Thuộc tính của đối tượng Brand
   public $brandID;
   public $brandName;

    // Phương thức khởi tạo
    public function __construct($brandID,$brandName) {
        $this->brandName = $brandName;
        $this->brandID=$brandID;
    }
}
   
?>
