/**
 * @author luiz filipe
 * Classe de representação de um componente Field do tipo text. 
 * O componente HTML input é usado para gerar essa representação.
 */
function FieldText( name, value ){	
	this.name = name;
	this.value = value;
	
	this._create();
}

/**
 * FieldText herda as propriedades da classe FieldCommons.
 */
FieldText.prototype = new FieldCommons();

/**
 * Tipo de FieldText. 
 */
FieldText.prototype.type = Field.TEXT;

/**
 * @private
 * Método que cria o conteúdo do HTML do tipo texto de edição do campo.
 */
FieldText.prototype._contentType = function FieldText__contentType(){
	var content = document.createElement( "input" );
	$( content ).attr( "type", Field.TEXT );
	$( content ).attr( "value", this.value );
	
	return content;
}

/**
 * @private
 * Método que cria o componente Field.
 */
FieldText.prototype._create = function FieldText__create(){
	this.containerLabel = document.createElement( "label" );
	this.containerValue = document.createElement( "div" );
	
	this.containerLabel.parent = this;
	this.containerValue.parent = this;
	
	$( this.containerLabel ).attr("id", this._labelId);
	$( this.containerValue ).attr("id", this._valueId);
	
	$( this.containerLabel ).append( document.createTextNode( this.name ) );
	$( this.containerValue ).append( document.createTextNode( this.value ) );
	
	$( this.containerValue ).click( this._eventTextDateComponent );
}