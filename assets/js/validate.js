$(document).ready(function() {
    $("#form")

        //Inserindo ícone indicando campos obrigatórios
        //Ações a serem realizadas ao carregar os campos do form
        .on('init.field.fv', function(e, data){
            var $icon  = data.element.data('fv.icon'),
            options    = data.fv.getOptions(),
            validators = data.fv.getOptions(data.field).validators;
            // Condição para inserir o ícone de obrigatório
            if (validators.notEmpty && options.icon && options.icon.required){
                $icon.addClass(options.icon.required).show();
            }
        })

        .formValidation({
            // Framework Utilizado
            framework: 'bootstrap',
            // Campos excluídos da validação
            excluded: [':hidden'],
            // Ícones de feedback
            icon: {
                required: 'glyphicon glyphicon-asterisk',
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            // Linguagem das mensagens
            locale: 'pt_BR',
            // Campos e regras de validação
            fields: {
                // Nome do campo
                'barco':{
                    // Validadores
                    validators:{
                        notEmpty:{
                            message: 'Selecione a embarcação'
                        }
                    }
                },
                'mestre':{
                    validators:{
                        notEmpty:{
                            message: 'Selecione o mestre'
                        }
                    }
                },
                'petre':{
                    validators:{
                        notEmpty:{
                            message: 'O petrecho é obrigatório'
                        }
                    }
                },
                'data_saida': {
                    validators: {
                        notEmpty: {
                            message: 'Selecione a data de saída'
                        },
                        date: {
                            format: 'DD/MM/YYYY'
                        }
                    }
                },
                'data_chegada':{
                    validators:{
                        notEmpty:{},
                        date:{
                            format: 'DD/MM/YYYY'
                        }

                    }
                },
                'obs':{
                    validators:{
                        stringLength:{
                            max: 500,
                            message: 'Limite de 500 caracteres'
                        }
                    }
                },
                'L1_lance':{
                    validators:{
                        notEmpty:{},
                        greaterThan:{
                           value: 1
                        }
                    }
                },
                'L1_lance_data':{
                    validators:{
                        notEmpty:{},
                        date:{
                            format: 'DD/MM/YYYY'
                        }
                    }
                },
                'L1_anzois':{
                    validators:{
                        notEmpty:{},
                        greaterThan:{
                            value: 1
                        }
                    }
                },
                'L1_lance_lat':{
                    validators:{
                        notEmpty:{},
                        between:{
                            min: -90,
                            max: 90,
                            message: 'A Latitude tem que ser entre -90.0 e 90.0'
                        }
                    }
                },
                'L1_lance_long':{
                    validators:{
                        notEmpty:{},
                        between:{
                            min: -180,
                            max: 180,
                            message: 'A Longitude tem que ser entre -180.0 e 180.0'
                        }
                    }
                },
                'L1_isca[]':{
                    validators:{
                        notEmpty:{}
                    }
                },
                'L1_lance_hora_ini':{
                    validators:{
                        notEmpty:{}
                    }
                },
                'L1_lance_hora_fin':{
                    validators:{
                        notEmpty:{}
                    }
                },
                'L1_mm_tipo[]':{
                    validators:{
                        notEmpty:{}
                    }
                },
                'L1_mm_uso':{
                    validators:{
                        notEmpty:{}
                    }
                },
                'L1_ave_capt':{
                    validators:{
                        notEmpty:{}
                    }
                },
                'capt_spp':{
                    row: '.col-md-8',
                    selector: '.capt_spp',
                    validators:{
                        notEmpty:{}
                    }
                },
                'L1_capt_quant1[]':{
                    validators:{
                        greaterThan:{
                            value: 1
                        }
                    }
                }
            }
        })

        //
        //// Remove o ícone Requerido quando o campo atualiza o status
        //.on('status.field.fv', function(e, data){
        //    var $icon       = data.element.data('fv.icon'),
        //        options     = data.fv.getoptions(),
        //        validators  = data.fv.getoptions(data.field).validators;
        //    if (validators.notEmpty && options.icon && options.icon.required){
        //        $icon.removeClass(options.icon.required).addClass('fa');
        //    }
        //})

        ////  Ação para esconder as msgs de erro ao validar o form
        //.on('err.field.fv', function(e, data){
        //    // Esconde as msgs
        //    data.element
        //        .data('fv.messages')
        //        .find('.help-block[data-fv-for="' + data.field + '"]').hide();
        //})
});


