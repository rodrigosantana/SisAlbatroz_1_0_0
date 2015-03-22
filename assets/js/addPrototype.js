var Prototype = {
    
    Class : function(settings) {
        var ptype = this;
        var config = {
            'count'          : 0,      //quantidade de elementos, quando for edit deve passar o size do array de elementos
            'list'           : null,   //id ou class da div que possui o data-prototype - OBS: SEMPRE mandar o prefixo # para id e . para class
            'container'      : null,   //id ou class da div container do prototype que fica no arquivo separado - OBS: SEMPRE mandar o prefixo # para id e . para class
            'addButton'      : null,   //id ou class do elemento que terá o evento de adicionar elemento quando clicado
            'removeButton'   : null,   //id ou class do elemento que terá o evento de remover elemento quando clicado
            'isEdit'         : '',     //sempre passar o id da entidade, pois, se o id existir indica que é edit e fará o load das ações do botão excluir e dos atalhos de teclado para os elementos gerados pelo twig
            'isAlwaysVisible': false,  //true quando o primeiro elemento não pode ser deletado
            'focusOnStart'   : false,  //true quando quiser o foco no primeiro elemento ao acessar a página de add
            'addOne'         : false,  //true quando quiser que um elemento já venha adicionado na tela
            'onDelete'       : null,    //nome de uma função de callback que será disparada quando o evento de deletar for acionado 
            'onCreate'       : null,    //nome de uma função de callback que será disparada ao termino da criação do componente 
            'isTchoice'      : false
        }
    
        if (settings){
            $.extend(config, settings);
        }
        
        this.elementCount = function(){
            return $(config.list).children(config.container).length;
        }
        
        this.getCount = function(){
            return config.count;
        }

        this.setCount = function(v){
            config.count  = v;
        }
        
        this.removerElemento = function (el){
            if(config.onDelete != null && el.find('input[type="hidden"]').val() != ""){
                config.onDelete(null, el.find('input[type="hidden"]').val());
            }
            
            if (config.isTchoice) {
               el.parents('form').unbind('submit'); 
            }
            
            el.remove();
            if(ptype.elementCount() > 0){
                $(config.list).children(config.container+':last').find('.insertaction').focus();
            }else{
                $(config.addButton).focus();
            }
        }

        this.teclaInsert = function (evt){
            if ($(evt.target).parents(config.container).length == 1){
                ptype.addElement(true);
            }
        }
        
        this.teclaDelete = function (evt){
            if ($(evt.target).parents(config.container).length == 1){
                ptype.removerElemento($(evt.target).parents(config.container));
                if(ptype.elementCount() > 0){
                    $(config.list).children(config.container+':last').find('.insertaction').focus();
                }else{
                    $(config.addButton).focus();
                }
                
            }    
        }  
                
        this.start = function(){
            
            if (config.isTchoice == true) {
                $(config.list).children(config.container).each(function(i){
                
                    var $btn = $(config.removeButton+'-'+i);
                    
                    if (config.isAlwaysVisible && i == 0){ 

                        //remove o botão delete
                        $btn.remove();

                    } else {

                        //seta evento de remoção para o botão delete
                        $btn.click(function(evt){
                            ptype.removerElemento($(evt.target).parents(config.container));
                        }); 

                        //seta evento de remoção por atalho de teclado
                        $(this).bind('keydown', 'Ctrl+del', ptype.teclaDelete);

                    }

                    //seta evento de adição por atalho de teclado
                    $(this).bind('keydown', 'Ctrl+insert', ptype.teclaInsert);
                
                });
            } else {
                $(config.list).children(config.container).find('.insertaction').each(function(i){
                    var $btn = $(config.removeButton+'-'+i);
                    
                    if (config.isAlwaysVisible && i == 0){ 

                        //remove o botão delete
                        $btn.remove();

                    } else {

                        //seta evento de remoção para o botão delete
                        $btn.click(function(evt){
                            ptype.removerElemento($(evt.target).parents(config.container));
                        }); 

                        //seta evento de remoção por atalho de teclado
                        $(this).bind('keydown', 'Ctrl+del', ptype.teclaDelete);

                    }

                    //seta evento de adição por atalho de teclado
                    $(this).bind('keydown', 'Ctrl+insert', ptype.teclaInsert);

                });
            }
        }
        
        //true no segundo parametro para setar focu no elemento após adiciona-lo na tela        
        this.addElement = function (setFocus){
            var removeKeyboardDeleteShortcut = false;
            var list = $(config.list);
            
            $(list).find('.collapse').addClass('expand');
            $(list).find('.expand').removeClass('collapse');
            $(list).find('.portlet-body').css('display', 'none');
            
            var newWidget = list.attr('data-prototype');
            //tenta substituir o padrão $$name$$ caso não encontre, tenta substituir o padrão $$name2$$
            //isto é usado quando tem collection dentro de collection
            if(newWidget.match(/\$\$numero\$\$/g) != null){
                newWidget = newWidget.replace(/\$\$numero\$\$/g, config.count);
            }else{
                newWidget = newWidget.replace(/\$\$numero2\$\$/g, config.count);
            }

            newWidget = $(newWidget);
            newWidget.appendTo(list);

            var $btn = $(config.removeButton+'-'+config.count);

            if (config.isAlwaysVisible && ptype.elementCount() == 1){

                //remove o botão delete
                $btn.remove();
                removeKeyboardDeleteShortcut= true;
            
            }else{
            
                $btn.click(function(evt){
					console.log("Aqui");
                    ptype.removerElemento($(evt.target).parents(config.container));
                    list.children(config.container+':last-child').find('.insertaction');
                }); 

            }

            $(list).ready(function(){
                
                if(setFocus){
                    if(list.children(config.container+':last-child').find('.hasfocusradio').length > 0){
                        list.children(config.container+':last-child').find('input[type="radio"]').focus();
                    }else if (list.children(config.container+':last-child').find('.hasfocusselect').length > 0) {
                        list.children(config.container+':last-child').find('.hasfocusselect').select2("focus", true);
                    } else {
                        list.children(config.container+':last-child').find('.hasfocus').focus();
                    }
                }
                
                if(!removeKeyboardDeleteShortcut){
                    list.children(config.container+':last-child').find('.insertaction').bind('keydown', 'Ctrl+del', ptype.teclaDelete); 
                }
                
                list.children(config.container+':last-child').find('.insertaction').bind('keydown', 'Ctrl+insert', ptype.teclaInsert); 
                
                if (config.onCreate != null){
                    config.onCreate(config.count);
                }            
                config.count++;
            });
            
            
            return false;
        }
        
        this.removeAll = function(){
            ptype.removerElemento($(config.list).children(config.container));
        }
        
        //seta evento para o botão de adicionar elemementos
        $(config.addButton).click(ptype.addElement);
        
        if(config.isEdit != ''){
             if(config.count > 0){
                 ptype.start();
             }else if(config.addOne || config.isAlwaysVisible){
                 ptype.addElement(config.focusOnStart);
             }
        }else{
            if(config.addOne || config.isAlwaysVisible){
                ptype.addElement(config.focusOnStart);
            }
        }   
    }                
}