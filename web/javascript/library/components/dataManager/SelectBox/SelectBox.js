/**
 * @author luiz filipe
 */
function SelectBox( options, parent ){
	this.options = options;
	this.parent = parent;
	
	var dateRun = new Date();
	var timeMs = dateRun.getTime();
	var randomMs = Math.floor(Math.random() * (timeMs+1));
	
	this._boxId = "label" + name + timeMs + randomMs;
}

SelectBox.prototype.containerBox = null;

SelectBox.prototype._create = function SelectBox__create(){
	this.containerBox = document.createElement( "div" );
	$( this.containerBox ).css( "overflow-y", "scroll" );
	$( this.containerBox ).css( "border", "1px solid" );
	$( this.containerBox ).css( "width", "100px" );
	$( this.containerBox ).css( "heigth", "100px" );
	var containerOption
	for( element in this.options ){
		containerOption = document.createElement( "div" );
		//TODO: todos os options tem referencia para o field. A melhor forma de expressar esta referencia não é parent
		containerOption.parent = this.parent;
		$( containerOption ).html( this.options[element] );
		$( containerOption ).css( "background-color", "#B4B4B4" );
		$( containerOption ).mouseover( this._mouseOverOptionEvent );
		$( containerOption ).mouseout( this._mouseOutOptionEvent );
		$( containerOption ).click( this._clickOptionEvent );
		$( this.containerBox ).append( containerOption );
	}
}

SelectBox.prototype._mouseOverOptionEvent = function SelectBox__mouseOverOptionEvent(){
	$( this ).css( "background-color", "#C8C8C8" );
	$( this ).css( "cursor", "pointer" );
}

SelectBox.prototype._mouseOutOptionEvent = function SelectBox__mouseOutOptionEvent (){
	$( this ).css( "background-color", "#B4B4B4" );
}

SelectBox.prototype._clickOptionEvent = function SelectBox__clickOptionEvent(){
	var field = this.parent;
	var inputElement = field.contentType();
	var selectedOption = this;
	var value = $( selectedOption ).html()
	
	field.value = value;
	$( inputElement ).attr( "value", value );
	$( field.contentValue ).html( document.createTextNode( value ) );
}