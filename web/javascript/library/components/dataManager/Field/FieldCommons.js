/**
 * @author luiz filipe
 * Classe abstrata de um Field que contém todas as propriedades comuns aos diversos tipos de Field.
 */

function FieldCommons (){
	var dateRun = new Date();
	var timeMs = dateRun.getTime();
	var randomMs = Math.floor(Math.random() * (timeMs+1));
	
	this._labelId = "label" + name + timeMs + randomMs;
	this._valueId = "value" + name + timeMs + randomMs;
	this._fieldId = "field" + name + timeMs + randomMs;
};

/**
 * Herda propriedades da Classe estática Field.
 */
FieldCommons.prorotype = Field;

/**
 * Elemento HTML utilizado para armazenamento e composição do nome do Campo.
 */
FieldCommons.prototype.containerLabel = null;

/**
 * Elemento HTML utilizado para armazenamento e composição do valor do Campo.
 */
FieldCommons.prototype.containerValue = null;

/**
 * Tipo do Field.
 */
FieldCommons.prototype.type = null;

/**
 * Nome/Label do Field.
 */
FieldCommons.prototype.name = null;

/**
 * Valor/Dado armazenado no campo.
 */
FieldCommons.prototype.value = null;

/**
 * Elemento HTML utilizado para edição e selecção da informação.
 */
FieldCommons.prototype._contentType = null;


/**
 * domObject - Método que gera um componente HTML com o Field agragado.
 * @return Um elemento HTML com o componente Field agredado.
 */
FieldCommons.prototype.domObject = function() {
	var returnField = document.createElement("div");
	$(returnField).attr("id", this._fieldId);
	$(returnField).append(this.containerLabel);
	$(returnField).append(this.containerValue);
	
	return returnField;
}

/**
 * Método para que o componente seja Field exibido em qualquer componente que esteja no documento HTML.
 * @param {String} target - ID do componente htmtl onde se quer inserir um campo
 * 
 */
FieldCommons.prototype.showIn = function(target) {
	$(target).append(this.domObject());
}

/**
 * Função disparada para alternar a visão dos componentes
 * Evento a ser disparado para os seguintes tipos do componente Field abaixo:
 * Text
 * TextArea
 * Date
 */
FieldCommons.prototype._eventTextDateComponent = function FieldCommons__eventTextDateComponent(){
	var divElement = this;
	var field = divElement.parent;
	var inputElement = field.contentType();
	var typeEventChangeData = ( field.type === Field.DATE ) ? "change" : "blur";
	//em uma análise profunda o  elemento div não deve perder seu evento de click.
	//$( divElement ).unbind( "click" );
	$( inputElement ).bind( typeEventChangeData, function(){
		//$( divElement ).bind( "click",  field._eventTextDateComponent );
		$( inputElement ).attr( "value", this.value );
		field.value = this.value;
		$( divElement ).html( document.createTextNode( this.value ) );
	});

	$( divElement ).html( inputElement );
	$( inputElement ).focus();
}

/**
 * Função disparada para alternar a visão dos componentes
 * Evento a ser disparado para o seguinte tipo de componente Field abaixo:
 * Password
 */
FieldCommons.prototype._eventPasswordComponent = function FieldCommons__eventPasswordComponent(){
	var divElement = this;
	var field = divElement.parent;
	var inputElement = field.contentType();
	var resultString = "";
	$( inputElement ).bind( "blur", function(){
		$( inputElement ).attr( "value", this.value );
		field.value = this.value;
		for( var i = 0 ; i < field.value.length; i++ ){
			resultString += "*"
		}
		$( divElement ).html( document.createTextNode( resultString ) );
	});

	$( divElement ).html( inputElement );
	$( inputElement ).focus();
}

/**
 * Função disparada para alternar a visão dos componentes
 * Evento a ser disparado para o seguinte tipo de componente Field abaixo:
 * Select
 */
FieldCommons.prototype._eventSelectComponent = function FieldCommons__eventSelectComponent(){
	var divElement = this;
	var field  = divElement.parent;
	var inputElement = field.contentType();
	$( inputElement ).bind( "change", function(){
		$( divElement ).html( document.createTextNode( this.value ) );
		
	} )
	
	$( divElement ).html( inputElement );
	$( divElement ).append( field.selectBox.containerBox );
	$( inputElement ).focus();
}
