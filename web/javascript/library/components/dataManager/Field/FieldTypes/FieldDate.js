/**
 * @author luiz filipe
 * Classe de representação de um componente Field do tipo date. 
 * O componente HTML input é usado para gerar essa representação.
 * O componente datepicker do jQuery é usado para gerar a escolha do conteúdo.
 */
function FieldDate( name, value ){
	this.name = name;
	this.value = value;
	
	this._create();	
}

/**
 * FieldDate herda as propriedades da classe FieldCommons.
 */
FieldDate.prototype = new FieldCommons();

/**
 * Tipo de FieldText. 
 */
FieldDate.prototype.type = Field.DATE;


/**
 * Método que cria o conteúdo do HTML do tipo date de edição do campo.
 */
FieldDate.prototype.contentType = function FieldDate__contentType(){
	if( !this._contentType ){
		this._contentType = document.createElement( "input" );
		$( this._contentType ).attr( "type", Field.TEXT );
		$( this._contentType ).attr( "value", this.value );
		$( this._contentType ).datepicker();
		$( this._contentType ).datepicker( "option", { dateFormat: "dd/mm/yy" });	
	}
	return this._contentType;
}

/**
 * @private
 * Método que cria o componente Field.
 */
FieldDate.prototype._create = function FieldDate__create(){
	this.containerLabel = document.createElement( "label" );
	this.containerValue = document.createElement( "div" );
	
	this.containerLabel.parent = this;
	this.containerValue.parent = this;
	
	$( this.containerLabel ).attr("id", this._labelId);
	$( this.containerValue ).attr("id", this._valueId);
	$( this.containerValue ).css( "width",  "146" );
	$( this.containerValue ).css( "heigth",  "15" );
	
	
	$( this.containerLabel ).append( document.createTextNode( this.name ) );
	$( this.containerValue ).append( document.createTextNode( this.value ) );
	
	$( this.containerValue ).click( this._eventTextDateComponent );
}