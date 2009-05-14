/**
 * @author luiz filipe
 * Classe de representação de um componente Field do tipo password. 
 * O componente HTML input é usado para gerar essa representação.
 */
function FieldPassword( name, value ){	
	this.name = name;
	this.value = value;
	
	this._create();
}

/**
 * FieldPassword herda as propriedades da classe FieldCommons.
 */
FieldPassword.prototype = new FieldCommons();

/**
 * Tipo de FieldPassword. 
 */
FieldPassword.prototype.type = Field.PASSWORD;

/**
 * Método que cria o conteúdo do HTML do tipo texto de edição do campo.
 */
FieldPassword.prototype.contentType = function FieldPassword_contentType(){
	if( !this._contentType ){
		this._contentType = document.createElement( "input" );
		$( this._contentType ).attr( "type", Field.PASSWORD );
		$( this._contentType ).attr( "value", this.value );
	}
	return this._contentType;
}

/**
 * @private
 * Método que cria o componente Field.
 */
FieldPassword.prototype._create = function FieldPassword__create(){
	this.containerLabel = document.createElement( "label" );
	this.containerValue = document.createElement( "div" );
	
	this.containerLabel.parent = this;
	this.containerValue.parent = this;
	
	$( this.containerLabel ).attr("id", this._labelId);
	$( this.containerValue ).attr("id", this._valueId);

	
	$( this.containerValue ).css( "border", "1px solid black" );
	$( this.containerValue ).css( "width",  "146" );
	
	
	$( this.containerLabel ).append( document.createTextNode( this.name ) );
	$( this.containerValue ).append( document.createTextNode( this.value ) );
	
	$( this.containerValue ).click( this._eventPasswordComponent );
}