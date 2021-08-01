<?php 

error_reporting(E_ERROR);
include_once '../common/funciones.php';
include_once '../class/fpdf/fpdf.php';

class documentoPDF extends fpdf  {
	
	private $mensajeTitulo;
	private $mensajeSubTitulo;
	private $mensajeSubSubTitulo;
	private $mensajeFooter;
	private $mensajeHeader;
	private $mensajeHeader2;
	private $mensajeHeader3;
	
	private $numeroFolio;
	
	private $empresa;
	
	
	public function setNumeroFolio($numeroFolio) {
		$this->numeroFolio = $numeroFolio;
	}
	
	
	public function setMensajeTitulo($mensajeTitulo) {
		$this->mensajeTitulo = $mensajeTitulo;
	}
	
	public function setMensajeSubTitulo($mensajeSubTitulo) {
		$this->mensajeSubTitulo = $mensajeSubTitulo;
	}
	
	public function setMensajeSubSubTitulo($mensajeSubSubTitulo) {
		$this->mensajeSubSubTitulo = $mensajeSubSubTitulo;
	}
	
	
	public function setMensajeFooter($mensajeFooter) {
		$this->mensajeFooter = $mensajeFooter;
	}
	
	public function setMensajeHeader($mensajeHeader) {
		$this->mensajeHeader = $mensajeHeader;
	}
	
	public function setMensajeHeader2($mensajeHeader2) {
		$this->mensajeHeader2 = $mensajeHeader2;
	}
	
	public function setMensajeHeader3($mensajeHeader3) {
		$this->mensajeHeader3 = $mensajeHeader3;
	}
	
	public function setEmpresa($empresa) {
		$this->empresa = $empresa;
	}
	
	 
	
	
	// Pie de página
	function Footer()
	{
		if($this->numeroFolio!="")
			return;
		
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Número de página
		$this->Cell(0,10,$this->PageNo(),0,0,'C');
	}
	
	
	function Header()
	{
			
		// Logo
		//$this->Image('logo_pb.png',10,8,33);
		// Arial bold 15
		$this->SetFont('Arial','B',6);
		// Movernos a la derecha
		$this->Cell(1);
		$this->Cell(5,0,$this->mensajeHeader,0,0,'L');
		$this->Ln(3);
		$this->Cell(1);
		$this->Cell(10,0,$this->mensajeHeader2,0,0,'L');
		if(!empty($this->mensajeHeader3)){
			$this->Ln(3);
			$this->Cell(1);
			$this->Cell(10,0,$this->mensajeHeader3,0,0,'L');
			
		}
		
		$this->Ln(10);
		
		$this->SetFont('Arial','B',15);
		// Movernos a la derecha
		$this->Cell(80);
		// Título
		$this->Cell(30,0,$this->mensajeTitulo,0,0,'C');
		// Salto de línea
		$this->Ln(5);
		$this->SetFont('Arial','B',10);
		$this->Cell(80);
		$this->Cell(30,0,$this->mensajeSubTitulo,0,0,'C');
		if($this->mensajeSubSubTitulo!=""){
			// Salto de línea
			$this->Ln(5);
			$this->SetFont('Arial','B',10);
			$this->Cell(80);
			$this->Cell(30,0,$this->mensajeSubSubTitulo,0,0,'C');
			$this->Ln(3);
			$this->Cell(30,0,"",0,0,'C');
		}
		
		
		if($this->numeroFolio!=""){
			// Salto de línea
			$this->Ln(5);
			$this->SetFont('Arial','B',10);
			$this->Cell(110);
			$this->Cell(110,0,str_pad($this->numeroFolio, 5, "0", STR_PAD_LEFT),0,0,'C');
			
			
			$this->Ln(3);
			$this->Cell(30,0,"",0,0,'C');
		}
		
	}
	
	
	function SetDash($black=false, $white=false)
	{
		if($black and $white)
			$s=sprintf('[%.3f %.3f] 0 d', $black*$this->k, $white*$this->k);
		else
			$s='[] 0 d';
		$this->_out($s);
	}
	
	
	
}






?>