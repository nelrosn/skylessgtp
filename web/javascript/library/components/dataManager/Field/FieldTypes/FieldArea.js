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
 * FieldArea herda as propriedades da classe FieldCommons.
 */
FieldArea.prototype = new FieldCommons();

/**
 * Tipo de FieldArea.
 */
FieldArea.prototype.type = Field.TEXTAREA;

/**
 * Largura de FieldArea.
 */
FieldArea.prototype.contentWidth = 300;

/**
 * Altura de FieldArea.
 */
FieldArea.prototype.contentHeight = 75;

/**
 * Método que cria o conteúdo do HTML do tipo textarea de edição do campo.
 */
FieldArea.prototype.contentType = function FieldArea_contentType(){
	if( !this._contentType ){
		this._contentType = document.createElement(Field.TEXTAREA);
		$( this._contentType ).css( "width", this.contentWidth.toString() );
		$( this._contentType ).css( "height", this.contentHeight.toString() );
		$( this._contentType ).append(document.createTextNode( this.value ) );
	}
	return this._contentType;
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
	$( this.containerValue ).css( "width", this.contentWidth );
	$( this.containerValue ).css( "heigth", this.contentHeight );
	$( this.containerValue ).css( "border", "1px solid black" );
	
	$( this.containerLabel ).append( document.createTextNode( this.name ) );
	$( this.containerValue ).append( document.createTextNode( this.value ) );
	
	$( this.containerValue ).click( this._eventTextDateComponent );
}