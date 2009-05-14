/**
 * @author luiz filipe
 */
function FieldSelect( name, value, options ){
	this.name = name;
	this.value = value;
	
	if( options ){
		this.selectBox = new SelectBox( options, this );
	}

	
	this._create()
}

FieldSelect.prototype = new FieldCommons;

FieldSelect.prototype.type = Field.SELECT;


FieldSelect.prototype.contentType = function FieldSelect_contentType(){
	if ( !this._contentType ){
		this._contentType = document.createElement( "input" );
		$( this._contentType ).attr( "type", Field.TEXT );
		$( this._contentType ).attr( "value", this.value );
	}
	
	
	return this._contentType;
}

FieldSelect.prototype._create = function FieldSelect__create(){
	this.containerLabel = document.createElement( "label" );
	this.containerValue = document.createElement( "div" );
	
	this.containerValue.parent = this;
	this.containerLabel.parent = this;
	
	$( this.containerLabel ).attr("id", this._labelId);
	$( this.containerValue ).attr("id", this._valueId);
	
	//TODO: todos os componentes do containerValue não devem ser exibidos nete momento, somente deve ser exibido a div do tamanho de um input.
	$( this.containerValue ).append( document.createTextNode( this.value ) );
	$( this.containerValue ).append( this.selectBox.containerBox );
	$( this.containerValue ).click( this._eventSelectComponent /*FieldCommons.showOrHideOptionsBoxEvent*/ );
	
	$( this.containerLabel ).append( document.createTextNode( this.name ) );
	this.selectBox._create();
}
