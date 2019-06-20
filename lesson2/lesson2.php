<?php
abstract class Goods {
	function __construct ($id, $name, $price, $img, $count) {
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
		$this->img = $img;
		$this->count = $count;

		if ($count>=0) {
			$this->count = $count;
		}
		else {
			$this->count = 0;
		};
	}
	abstract function totalCost();
};

class DidgitalGoods extends Goods {

		function totalCost () {
			echo "Товар цифровой, входные данные: ID $this->id Наименование	$this->name Цена $this->price Картинка $this->img Количество $this->count <br>";

			if ($this->count>1) {
				$this->count = 1;
			}
			else {
				$this->count = 0;
			};
			$total = $this->price * $this->count;
			echo "Общая сумма: $total";
			return $total;
		}
};

class SingleGoods extends Goods {
		
		function totalCost () {
			echo "Товар штучный, входные данные: ID $this->id Наименование	$this->name Цена $this->price Картинка $this->img Количество $this->count <br>";
			$this->count = round($this->count);
			$total = $this->price * $this->count;
			echo "Общая сумма: $total";
			return $total;
		}
};

class WeightGoods extends Goods {

		function totalCost () {
			echo "Товар весовой, входные данные: ID $this->id Наименование	$this->name Цена $this->price Картинка $this->img Количество $this->count <br>";
			if ($this->count < 5) {
				$k = 1; //при количестве до 5 кг цена считается с коэффициентом 1
			}
			else {
				$k = 0.9; //в противном случае - скидка 10%, коэффициент 0.9
			};
			$total = $this->price * $this->count;
			echo "Общая сумма: $total";
			return $total;
		}
};

$d_obj = new DidgitalGoods('001', 'MS Office', 110, 'img.jgp', 1);
$d_obj->totalCost();
$s_obj = new SingleGoods('002', 'Клавиатура', 10, 'img2.jgp', 2);
$s_obj->totalCost();
$w_obj = new WeightGoods('003', 'Гвозди', 7, 'img.jgp', 4.5);
$w_obj->totalCost();
