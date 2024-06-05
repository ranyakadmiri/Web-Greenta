<?php
	class machine{
		private $id=null;
		private $nom=null;
		private $prix=null;
		private $dsp=null;
		private $imagep=null;
		function __construct($nom, $prix, $dsp, $imagep){
			$this->nom=$nom;
			$this->prix=$prix;
			$this->dsp=$dsp;
			$this->imagep=$imagep;
		}
		function getid(){
			return $this->id;
		}
		function getnom(){
			return $this->nom;
		}
		function getprix(){
			return $this->prix;
		}
		function getdsp(){
			return $this->dsp;
		}
		function getimagep(){
			return $this->imagep;
		}
		
		function setnom(string $nom){
			$this->nom=$nom;
		}
		function setprix(int $prix){
			$this->prix=$prix;
		}
		function setdsp(int $dsp){
			$this->dsp=$dsp;
		}
		function setimagep(string $imagep){
			$this->imagep=$imagep;
		}
	}
