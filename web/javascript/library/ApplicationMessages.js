/**
 * @author luiz filipe
 */
ApplicationMessages = function() {}

ApplicationMessages.prototype.container = null;
ApplicationMessages.prototype.colorBackground = "#FFF1A8";

ApplicationMessages.prototype.showMessage = function( message ){
	if(this.container) {
		this.hideMessage();
	}
	
	this.container = document.createElement("span");
	$(this.container).append(document.createTextNode( message ));
	$(document.body).append(this.container);
	
	$(this.container).css("position", "absolute");
	$(this.container).css("backgroundColor", this.colorBackground);
	$(this.container).css("padding", "2px");
	$(this.container).css("left", (document.width/2) - $(this.container).innerWidth()/2 );
	$(this.container).css("top", "0" );
}

ApplicationMessages.prototype.hideMessage = function() {
	$(this.container).remove();
	this.container = null;
}


