/**
 * @author luiz filipe
 * Classe de representação de um componente Field do tipo date. 
 * O componente HTML textarea é usado para gerar essa representação.
 */
function FieldArea( name, value ){
	this.name = name;
	this.value = value;
	
	this._create();	
}

/**
 * FieldDate herda as propriedades da classe FieldCommons.
 */
FieldArea.prototype = new FieldCommons();

/**
 * Tipo de FieldArea.
 */
FieldArea.prototype.type = Field.TEXTAREA;

/**
 * @private
 * Método que cria o conteúdo do HTML do tipo textarea de edição do campo.
 */
FieldArea.prototype._contentType = function FieldArea__contentType(){
	var content = document.createElement(Field.TEXTAREA);
	$(content).append(document.createTextNode(this.value));
	return content;
}

/**
 * @private
 * Método que cria o componente Field.
 */
FieldArea.prototype._create = function FieldArea__create(){
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