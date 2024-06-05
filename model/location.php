<?php
	class location{
		private $id=null;
		private $id_client=null;
		private $id_produit=null;
		private $date_d=null;
		private $date_f=null;
		function __construct($id_client, $id_produit, $date_d, $date_f){
			$this->id_client=$id_client;
			$this->id_produit=$id_produit;
			$this->date_d=$date_d;
			$this->date_f=$date_f;
		}
		function getid(){
			return $this->id;
		}
		function getidclient(){
			return $this->id_client;
		}
		function getidproduit(){
			return $this->id_produit;
		}
		function getdated(){
			return $this->date_d;
		}
		function getdatef(){
			return $this->date_f;
		}
		
		function setidclient(string $id_client){
			$this->id_client=$id_client;
		}
		function setidproduit(string $id_produit){
			$this->id_produit=$id_produit;
		}
		function setdated(string $date_d){
			$this->date_d=$date_d;
		}
		function setdatef(string $date_f){
			$this->date_f=$date_f;
		}
	}
?>