WYMeditor.editor.prototype.hovertools=function(){var wym=this;wym.status('&#160;');jQuery(wym._box).find(wym._options.toolSelector).hover(function(){var button=this;wym.status(jQuery(button).html())},function(){wym.status('&#160;')});jQuery(wym._box).find(wym._options.classSelector).hover(function(){var button=this,aClasses=eval(wym._options.classesItems),sName=jQuery(button).attr(WYMeditor.NAME),oClass=WYMeditor.Helper.findByName(aClasses,sName);if(oClass){jqexpr=oClass.expr;if(!WYMeditor.isInternetExplorerPre11()){wym.$body().find(jqexpr).css('background-color','#cfc')}}},function(){if(!WYMeditor.isInternetExplorerPre11()){wym.$body().find('*').removeAttr('style')}})};