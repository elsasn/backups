$(function() {
    // wizard
    uk_wizard.advanced_wizard();
});

// wizard
uk_wizard = {
    content_height: function(this_wizard,step) {
        var this_height = $(this_wizard).find('.step-'+ step).actual('outerHeight');
        $(this_wizard).children('.content').animate({ height: this_height }, 140, bez_easing_swiftOut);
    },
    advanced_wizard: function() {
        var $wizard_advanced = $('#wizard_advanced'),
            $wizard_advanced_form = $('#wizard_advanced_form');



        if ($wizard_advanced.length) {
            $wizard_advanced.steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                trigger: 'change',
                onInit: function(event, currentIndex) {
                    uk_wizard.content_height($wizard_advanced,currentIndex);
                    // reinitialize textareas autosize
                    uk_forms.textarea_autosize();
                    // reinitialize checkboxes
                    uk_md.checkbox_radio($(".wizard-icheck"));
                    $(".wizard-icheck").on('ifChecked', function(event){
                        console.log(event.currentTarget.value);
                    });
                    // reinitialize uikit margin
                    uk_uikit.reinitialize_grid_margin();
                    // reinitialize selects
                    uk_forms.select_elements($wizard_advanced);
                    // reinitialize switches
                    $wizard_advanced.find('span.switchery').remove();
                    uk_forms.switches();
                    // resize content when accordion is toggled
                    $('.uk-accordion').on('toggle.uk.accordion',function() {
                        $window.resize();
                    });

                    setTimeout(function() {
                        $window.resize();
                    },100);
                },
                onStepChanged: function (event, currentIndex) {
                    $('#calendar_selectable').fullCalendar('render');
                    //alert($('#input_nama').val());
            var select_gelar = $('#select_gelar').val();
            var input_nama = $('#input_nama').val();
            var input_tanggal_lahir = $('#input_tanggal_lahir').val();
            var input_tanggal_wafat = $('#input_tanggal_wafat').val();
            var input_pukul = $('#input_pukul').val();
            var select_keagamaan = $('#select_keagamaan').val();
            var input_route = $('#input_route').val();
            var input_jam_berangkat = $('#input_jam_berangkat').val();
            var input_nama_keluarga = $('#input_nama_keluarga').val();
            var input_hubungan = $('#input_hubungan').val();
            var input_alamat = $('#input_alamat').val();
            var input_no = $('#input_no').val();
            var select_upacara_secara = $('#select_upacara_secara').val();
            var input_umur = $('#input_umur').val();
            var jenis_waktu = $('#jenis_waktu').val();
            var input_nama_petugas = $('#input_nama_petugas').val();
            var start = $('#start').val();
            var durasi = $('#durasi').val();
            var end_date_durasi = $('#end_date_durasi').val();
            var select_tipe_ruang = $('#select_tipe_ruang').val();
            var select_paket = $('#select_paket').val();
            var jml_total_tambahan = $('#jml_total_tambahan').val();
      // var select_upacara_secara = $('#select_upacara_secara').val();
      // var select_upacara_secara = $('#select_upacara_secara').val();
            var wizard_advanced_form = $('#wizard_advanced_form');

              $.ajax({
                  type    : 'POST',
                  data    : wizard_advanced_form.serialize()+'&select_gelar='+select_gelar+'&input_nama='+input_nama
                  +'&input_tanggal_lahir='+input_tanggal_lahir
                  +'&input_tanggal_wafat='+input_tanggal_wafat+'&input_pukul='+input_pukul
                  +'&select_keagamaan='+select_keagamaan+'&input_route='+input_route
                  +'&input_jam_berangkat='+input_jam_berangkat
                  +'&input_nama_keluarga='+input_nama_keluarga+'&input_hubungan='+input_hubungan
                  +'&input_alamat='+input_alamat+'&input_no='+input_no
                  +'&select_upacara_secara='+select_upacara_secara+'&input_umur='+input_umur
                  +'&jenis_waktu='+jenis_waktu+'&input_nama_petugas='+input_nama_petugas
                  +'&start='+start+'&durasi='+durasi+'&end_date_durasi='+end_date_durasi
                  +'&select_tipe_ruang='+select_tipe_ruang+'&select_paket='+select_paket
                  +'&jml_total_tambahan='+jml_total_tambahan,
                  url: base_url+'client/finish_data',
                  success: function(msg) {  
                    $('#data_finish').html(msg);
                  }
              });
              
                    uk_wizard.content_height($wizard_advanced,currentIndex);
                    setTimeout(function() {
                        $window.resize();
                    },100)
                },
                onStepChanging: function (event, currentIndex, newIndex) {
                    var step = $wizard_advanced.find('.body.current').attr('data-step'),
                        $current_step = $('.body[data-step=\"'+ step +'\"]');

                    // check input fields for errors
                    $current_step.find('.parsley-row').each(function() {
                       // $(this).find('input,textarea,select').each(function() {
                        $(this).find('#input_nama').each(function() {
                            // $(this).parsley();
                            $(this).parsley().validate();
                        });
                    });

                    // adjust content height
                    $window.resize();

                    return $current_step.find('.md-input-danger').length ? false : true;
                },
                onFinished: function() {
                    var form_serialized = JSON.stringify( $wizard_advanced_form.serializeObject(), null, 2 );
                    UIkit.modal.alert('<p>Data Akan Disimpan !</p>');

                    $('.uk-modal-close').click(function() {
                        var wizard_advanced_form = $('#wizard_advanced_form');
                            $('.button_finish').attr('display','none');
                            $('#finish_step').html('Please wait..').prop('disabled', 'disabled');
                              $.ajax({
                                  type    : 'POST',
                                  data    : wizard_advanced_form.serialize(),
                                  url: base_url+'client/save_client',        
                                  success: function(msg) {  
                                    if(msg == 1){
                                        $.ambiance({message:'Sukses',
                                            type: "success",
                                            fade: false});
                                        // $('<input class="finish-btn sf-right sf-btn" type="submit" value="finish" disabled/>')
                                        top.location.href = base_url+'client';
                                    }else{
                                        $.ambiance({message:'Sukses',
                                            type: "success",
                                            fade: false});
                                        top.location.href = base_url+'client';
                                    }
                                  }
                              });

                    });
                }
            })/*.steps("setStep", 2)*/;

            $window.on('debouncedresize',function() {
                var current_step = $wizard_advanced.find('.body.current').attr('data-step');
                uk_wizard.content_height($wizard_advanced,current_step);
            });

            // wizard
            $wizard_advanced_form
                .parsley()
                .on('form:validated',function() {
                    setTimeout(function() {
                        uk_md.update_input($wizard_advanced_form.find('.md-input'));
                        // adjust content height
                        $window.resize();
                    },100)
                })
                .on('field:validated',function(parsleyField) {

                    var $this = $(parsleyField.$element);
                    setTimeout(function() {
                        uk_md.update_input($this);
                        // adjust content height
                        var currentIndex = $wizard_advanced.find('.body.current').attr('data-step');
                        uk_wizard.content_height($wizard_advanced,currentIndex);
                    },1000);

                });

        }
    }
};