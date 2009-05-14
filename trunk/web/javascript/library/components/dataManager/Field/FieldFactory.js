/**
 * @author luiz filipe
 * Classe estática constrói os diversos tipos de Field;
 */
FieldFactory = new Object()

FieldFactory.prototype = Field;

/**
 * Método fabricante de fields.
 * @param {Object} name - titulo do label, representa o contexto ddo valor que o Field irá conter
 * @param {Object} value - valor do campo, dado que irá ser manipulado pelo Field.
 * @param {Object} type - tipo de campo, abstração dos principais componentes HTML usados para manipulação de dados.
 * @param {object} options - somente utilizado para fields do tipo select e radio.
 * @return retorna um tipo de Field html.
 */
FieldFactory.createField = function FieldFactory_createField( name, value, type, options ){
	var field;
	switch( type ){
		case Field.TEXT:
			field = new FieldText( name, value );
		break;
		case Field.DATE:
			field = new FieldDate( name, value );
		break;
		case Field.AREA:
			field = new FieldArea( name, value );
		break;
		case Field.PASSWORD:
			field = new FieldPassword( name, value );
		break;
		case Field.SELECT:
			field = new FieldSelect ( name, value, options );
		break;
	}
	return field;
}
