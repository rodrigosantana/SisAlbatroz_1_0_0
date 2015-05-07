var FieldManagement = {
    Class: function(settings) {
        var fm = this;
        
        var config = {
            'containerId'           : 'field_manager_container',
            'tableList'             : null,
            'urlValidation'         : '',
            'addButton'             : '.add_button',
            'count'                 : 0,
            
            
            
            'fieldsContainer'       : 'fields_container',      
            'tableName'             : 'fields_table',
                        
            
            'cancelButton'          : 'cancel_button',
            'validationURL'         : '',
            'editButtonClass'       : 'edit_button_class',
            'removeButtonClass'     : 'remove_button_class',
            'hiddenContainer'       : 'hidden_container'
        };
    
        if (settings){
            $.extend(config, settings);
        }
        
        this.init = function() {
            var container = $('#'+config.containerId);     
            var newWidget = container.attr('data-prototype');
            container.html(fm.addStartHtml(newWidget));
            
            var addButton = container.find(config.addButton);
            
            if (addButton.length > 0) {
                addButton.click(fm.addItem);
            }            
        };
        
        this.addStartHtml = function (formHtml) {
            var html =  '<div id="'+config.containerId+'_form">' +
                            formHtml +
                        '</div>' +
                        '<hr class="hr-sisalbatroz">' +
                        '<div id="'+config.containerId+'_table">' +
                            fm.tableHtml() +
                        '</div>' +
                        '<div id="'+config.containerId+'_hidden" style="display: none;">' +
                        '</div>' +
                            '' +
                            '' +
                            '' +
                            '' +
                            '' +
                            '';
            return html;
        };
        
        this.tableHtml = function() {
            var tableHead = '';
            for (var i = 0; i < config.tableList.length; i++) {
                var item = config.tableList[i];                
                tableHead += '<th class="text-center">'+item.header+'</th>';
            }
            
            tableHead += '<th class="text-center">Ações</th>';            
            
            var html = '<table class="table table-striped table-condensed table-hover">' +
                            '<thead>' +
                                '<tr>' +
                                    tableHead +
                                '</tr>' +
                            '</thead>' +
                            '<tbody></tbody>' +
                        '</table>';
                
            return html;
        };
        
        this.addItem = function () {            
            var data = $('#'+config.containerId+'_form').find('select, textarea, input');
            fm.dataValidation(data, fm.addHiddenData);            
        };
        
        this.dataValidation = function (data, addDataToHidden) {
            if (!data) {
                return;
            }
//            $(".help-block").remove();
//            $(".has-error").removeClass("has-error");
            
            var urlValidation = config.urlValidation;
            
            //TODO criar a lógica de validacao
            
//            //teste sem erro na validação
//            console.log(data);
//            addDataToHidden(data);return;
            
            blockWindow();
            $.ajax({
                type: "POST",
                cache: false,
                url: urlValidation,
                dataType: "json",
                data: data.serialize(),
                success: function (res) {
                    unblockWindow();
                    
                    if (showError(res)) {
                        console.log(res);
                        $('#'+config.containerId+'_hidden').append(res.hidden);
                        //addDataToHidden(data);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {            
                    unblockWindow();
                    console.log(thrownError);
                },
                async: true
            });
            return false;
        };
        
        this.addHiddenData = function(data) {
//            var fields = data;
//            var htmlHidden = '';
//            
//            for(var i = 0; i < fields.length; i++) {
//                var field = fields[i];
//                var id = $(field).attr('id');
//                var ids = id.split('_');
//                var name = '';
//                
//                
//                if (ids.length == 2) {
//                    name = ids[0] + '[' + config.count + '][' + ids[1] + ']';
//                }
//                
//                htmlHidden += '<input type="hidden" name="'+name+'" value="'++'">';
//                
//                
//                
//                
//                console.log();
//                
//            }
//            
//            console.log(data);
        };
        
        fm.init();
    }         
    
};

