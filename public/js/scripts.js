"use strict";

// ChartJS
if (window.Chart) {
    Chart.defaults.global.defaultFontFamily = "'Nunito', 'Segoe UI', 'Arial'";
    Chart.defaults.global.defaultFontSize = 12;
    Chart.defaults.global.defaultFontStyle = 500;
    Chart.defaults.global.defaultFontColor = "#999";
    Chart.defaults.global.tooltips.backgroundColor = "#000";
    Chart.defaults.global.tooltips.bodyFontColor = "rgba(255,255,255,.7)";
    Chart.defaults.global.tooltips.titleMarginBottom = 10;
    Chart.defaults.global.tooltips.titleFontSize = 14;
    Chart.defaults.global.tooltips.titleFontFamily = "'Nunito', 'Segoe UI', 'Arial'";
    Chart.defaults.global.tooltips.titleFontColor = '#fff';
    Chart.defaults.global.tooltips.xPadding = 15;
    Chart.defaults.global.tooltips.yPadding = 15;
    Chart.defaults.global.tooltips.displayColors = false;
    Chart.defaults.global.tooltips.intersect = false;
    Chart.defaults.global.tooltips.mode = 'nearest';
}

// DropzoneJS
if (window.Dropzone) {
    Dropzone.autoDiscover = false;
}

// Basic confirm box
$('[data-confirm]').each(function () {
    var me = $(this),
        me_data = me.data('confirm');

    me_data = me_data.split("|");
    me.fireModal({
        title: me_data[0],
        body: me_data[1],
        buttons: [
            {
                text: me.data('confirm-text-yes') || 'Yes',
                class: 'btn btn-danger btn-shadow',
                handler: function () {
                    eval(me.data('confirm-yes'));
                }
            },
            {
                text: me.data('confirm-text-cancel') || 'Cancel',
                class: 'btn btn-secondary',
                handler: function (modal) {
                    $.destroyModal(modal);
                    eval(me.data('confirm-no'));
                }
            }
        ]
    })
});

// Global
$(function () {
    let sidebar_nicescroll_opts = {
        cursoropacitymin: 0,
        cursoropacitymax: .8,
        zindex: 892
    }, now_layout_class = null;

    var sidebar_sticky = function () {
        if ($("body").hasClass('layout-2')) {
            $("body.layout-2 #sidebar-wrapper").stick_in_parent({
                parent: $('body')
            });
            $("body.layout-2 #sidebar-wrapper").stick_in_parent({ recalc_every: 1 });
        }
    }
    sidebar_sticky();

    var sidebar_nicescroll;
    var update_sidebar_nicescroll = function () {
        let a = setInterval(function () {
            if (sidebar_nicescroll != null)
                sidebar_nicescroll.resize();
        }, 10);

        setTimeout(function () {
            clearInterval(a);
        }, 600);
    }

    var sidebar_dropdown = function () {
        if ($(".main-sidebar").length) {
            $(".main-sidebar").niceScroll(sidebar_nicescroll_opts);
            sidebar_nicescroll = $(".main-sidebar").getNiceScroll();

            $(".main-sidebar .sidebar-menu li a.has-dropdown").off('click').on('click', function () {
                var me = $(this);
                var active = false;
                if (me.parent().hasClass("active")) {
                    active = true;
                }

                $('.main-sidebar .sidebar-menu li.active > .dropdown-menu').slideUp(500, function () {
                    update_sidebar_nicescroll();
                    return false;
                });

                $('.main-sidebar .sidebar-menu li.active').removeClass('active');

                if (active == true) {
                    me.parent().removeClass('active');
                    me.parent().find('> .dropdown-menu').slideUp(500, function () {
                        update_sidebar_nicescroll();
                        return false;
                    });
                } else {
                    me.parent().addClass('active');
                    me.parent().find('> .dropdown-menu').slideDown(500, function () {
                        update_sidebar_nicescroll();
                        return false;
                    });
                }

                return false;
            });

            $('.main-sidebar .sidebar-menu li.active > .dropdown-menu').slideDown(500, function () {
                update_sidebar_nicescroll();
                return false;
            });
        }
    }
    sidebar_dropdown();

    if ($("#top-5-scroll").length) {
        $("#top-5-scroll").css({
            height: 315
        }).niceScroll();
    }

    $(".main-content").css({
        minHeight: $(window).outerHeight() - 108
    })

    $(".nav-collapse-toggle").click(function () {
        $(this).parent().find('.navbar-nav').toggleClass('show');
        return false;
    });

    $(document).on('click', function (e) {
        $(".nav-collapse .navbar-nav").removeClass('show');
    });

    var toggle_sidebar_mini = function (mini) {
        let body = $('body');

        if (!mini) {
            body.removeClass('sidebar-mini');
            $(".main-sidebar").css({
                overflow: 'hidden'
            });
            setTimeout(function () {
                $(".main-sidebar").niceScroll(sidebar_nicescroll_opts);
                sidebar_nicescroll = $(".main-sidebar").getNiceScroll();
            }, 500);
            $(".main-sidebar .sidebar-menu > li > ul .dropdown-title").remove();
            $(".main-sidebar .sidebar-menu > li > a").removeAttr('data-toggle');
            $(".main-sidebar .sidebar-menu > li > a").removeAttr('data-original-title');
            $(".main-sidebar .sidebar-menu > li > a").removeAttr('title');
        } else {
            body.addClass('sidebar-mini');
            body.removeClass('sidebar-show');
            sidebar_nicescroll.remove();
            sidebar_nicescroll = null;
            $(".main-sidebar .sidebar-menu > li").each(function () {
                let me = $(this);

                if (me.find('> .dropdown-menu').length) {
                    me.find('> .dropdown-menu').hide();
                    me.find('> .dropdown-menu').prepend('<li class="dropdown-title pt-3">' + me.find('> a').text() + '</li>');
                } else {
                    me.find('> a').attr('data-toggle', 'tooltip');
                    me.find('> a').attr('data-original-title', me.find('> a').text());
                    $("[data-toggle='tooltip']").tooltip({
                        placement: 'right'
                    });
                }
            });
        }
    }

    $("[data-toggle='sidebar']").click(function () {
        var body = $("body"),
            w = $(window);

        if (w.outerWidth() <= 1024) {
            body.removeClass('search-show search-gone');
            if (body.hasClass('sidebar-gone')) {
                body.removeClass('sidebar-gone');
                body.addClass('sidebar-show');
            } else {
                body.addClass('sidebar-gone');
                body.removeClass('sidebar-show');
            }

            update_sidebar_nicescroll();
        } else {
            body.removeClass('search-show search-gone');
            if (body.hasClass('sidebar-mini')) {
                toggle_sidebar_mini(false);
            } else {
                toggle_sidebar_mini(true);
            }
        }

        return false;
    });

    var toggleLayout = function () {
        var w = $(window),
            layout_class = $('body').attr('class') || '',
            layout_classes = (layout_class.trim().length > 0 ? layout_class.split(' ') : '');

        if (layout_classes.length > 0) {
            layout_classes.forEach(function (item) {
                if (item.indexOf('layout-') != -1) {
                    now_layout_class = item;
                }
            });
        }

        if (w.outerWidth() <= 1024) {
            if ($('body').hasClass('sidebar-mini')) {
                toggle_sidebar_mini(false);
                $('.main-sidebar').niceScroll(sidebar_nicescroll_opts);
                sidebar_nicescroll = $(".main-sidebar").getNiceScroll();
            }

            $("body").addClass("sidebar-gone");
            $("body").removeClass("layout-2 layout-3 sidebar-mini sidebar-show");
            $("body").off('click touchend').on('click touchend', function (e) {
                if ($(e.target).hasClass('sidebar-show') || $(e.target).hasClass('search-show')) {
                    $("body").removeClass("sidebar-show");
                    $("body").addClass("sidebar-gone");
                    $("body").removeClass("search-show");

                    update_sidebar_nicescroll();
                }
            });

            update_sidebar_nicescroll();

            if (now_layout_class == 'layout-3') {
                let nav_second_classes = $(".navbar-secondary").attr('class'),
                    nav_second = $(".navbar-secondary");

                nav_second.attr('data-nav-classes', nav_second_classes);
                nav_second.removeAttr('class');
                nav_second.addClass('main-sidebar');

                let main_sidebar = $(".main-sidebar");
                main_sidebar.find('.container').addClass('sidebar-wrapper').removeClass('container');
                main_sidebar.find('.navbar-nav').addClass('sidebar-menu').removeClass('navbar-nav');
                main_sidebar.find('.sidebar-menu .nav-item.dropdown.show a').click();
                main_sidebar.find('.sidebar-brand').remove();
                main_sidebar.find('.sidebar-menu').before($('<div>', {
                    class: 'sidebar-brand'
                }).append(
                    $('<a>', {
                        href: $('.navbar-brand').attr('href'),
                    }).html($('.navbar-brand').html())
                ));
                setTimeout(function () {
                    sidebar_nicescroll = main_sidebar.niceScroll(sidebar_nicescroll_opts);
                    sidebar_nicescroll = main_sidebar.getNiceScroll();
                }, 700);

                sidebar_dropdown();
                $(".main-wrapper").removeClass("container");
            }
        } else {
            $("body").removeClass("sidebar-gone sidebar-show");
            if (now_layout_class)
                $("body").addClass(now_layout_class);

            let nav_second_classes = $(".main-sidebar").attr('data-nav-classes'),
                nav_second = $(".main-sidebar");

            if (now_layout_class == 'layout-3' && nav_second.hasClass('main-sidebar')) {
                nav_second.find(".sidebar-menu li a.has-dropdown").off('click');
                nav_second.find('.sidebar-brand').remove();
                nav_second.removeAttr('class');
                nav_second.addClass(nav_second_classes);

                let main_sidebar = $(".navbar-secondary");
                main_sidebar.find('.sidebar-wrapper').addClass('container').removeClass('sidebar-wrapper');
                main_sidebar.find('.sidebar-menu').addClass('navbar-nav').removeClass('sidebar-menu');
                main_sidebar.find('.dropdown-menu').hide();
                main_sidebar.removeAttr('style');
                main_sidebar.removeAttr('tabindex');
                main_sidebar.removeAttr('data-nav-classes');
                $(".main-wrapper").addClass("container");
                // if(sidebar_nicescroll != null)
                //   sidebar_nicescroll.remove();
            } else if (now_layout_class == 'layout-2') {
                $("body").addClass("layout-2");
            } else {
                update_sidebar_nicescroll();
            }
        }
    }
    toggleLayout();
    $(window).resize(toggleLayout);

    $("[data-toggle='search']").click(function () {
        var body = $("body");

        if (body.hasClass('search-gone')) {
            body.addClass('search-gone');
            body.removeClass('search-show');
        } else {
            body.removeClass('search-gone');
            body.addClass('search-show');
        }
    });

    // tooltip
    $("[data-toggle='tooltip']").tooltip();

    // popover
    $('[data-toggle="popover"]').popover({
        container: 'body'
    });

    // Select2
    if (jQuery().select2) {
        $(".select2").select2();
    }

    // Selectric
    if (jQuery().selectric) {
        $(".selectric").selectric({
            disableOnMobile: false,
            nativeOnMobile: false
        });
    }

    $(".notification-toggle").dropdown();
    $(".notification-toggle").parent().on('shown.bs.dropdown', function () {
        $(".dropdown-list-icons").niceScroll({
            cursoropacitymin: .3,
            cursoropacitymax: .8,
            cursorwidth: 7
        });
    });

    $(".message-toggle").dropdown();
    $(".message-toggle").parent().on('shown.bs.dropdown', function () {
        $(".dropdown-list-message").niceScroll({
            cursoropacitymin: .3,
            cursoropacitymax: .8,
            cursorwidth: 7
        });
    });

    if ($(".chat-content").length) {
        $(".chat-content").niceScroll({
            cursoropacitymin: .3,
            cursoropacitymax: .8,
        });
        $('.chat-content').getNiceScroll(0).doScrollTop($('.chat-content').height());
    }

    if (jQuery().summernote) {
        $(".summernote").summernote({
            dialogsInBody: true,
            minHeight: 250,
        });
        $(".summernote-simple").summernote({
            dialogsInBody: true,
            minHeight: 150,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['paragraph']]
            ]
        });
    }

    if (window.CodeMirror) {
        $(".codeeditor").each(function () {
            let editor = CodeMirror.fromTextArea(this, {
                lineNumbers: true,
                theme: "duotone-dark",
                mode: 'javascript',
                height: 200
            });
            editor.setSize("100%", 200);
        });
    }

    // Follow function
    $('.follow-btn, .following-btn').each(function () {
        var me = $(this),
            follow_text = 'Follow',
            unfollow_text = 'Following';

        me.click(function () {
            if (me.hasClass('following-btn')) {
                me.removeClass('btn-danger');
                me.removeClass('following-btn');
                me.addClass('btn-primary');
                me.html(follow_text);

                eval(me.data('unfollow-action'));
            } else {
                me.removeClass('btn-primary');
                me.addClass('btn-danger');
                me.addClass('following-btn');
                me.html(unfollow_text);

                eval(me.data('follow-action'));
            }
            return false;
        });
    });

    // Dismiss function
    $("[data-dismiss]").each(function () {
        var me = $(this),
            target = me.data('dismiss');

        me.click(function () {
            $(target).fadeOut(function () {
                $(target).remove();
            });
            return false;
        });
    });

    // Collapsable
    $("[data-collapse]").each(function () {
        var me = $(this),
            target = me.data('collapse');

        me.click(function () {
            $(target).collapse('toggle');
            $(target).on('shown.bs.collapse', function (e) {
                e.stopPropagation();
                me.html('<i class="fas fa-minus"></i>');
            });
            $(target).on('hidden.bs.collapse', function (e) {
                e.stopPropagation();
                me.html('<i class="fas fa-plus"></i>');
            });
            return false;
        });
    });

    // Gallery
    $(".gallery .gallery-item").each(function () {
        var me = $(this);

        me.attr('href', me.data('image'));
        me.attr('title', me.data('title'));
        if (me.parent().hasClass('gallery-fw')) {
            me.css({
                height: me.parent().data('item-height'),
            });
            me.find('div').css({
                lineHeight: me.parent().data('item-height') + 'px'
            });
        }
        me.css({
            backgroundImage: 'url("' + me.data('image') + '")'
        });
    });
    if (jQuery().Chocolat) {
        $(".gallery").Chocolat({
            className: 'gallery',
            imageSelector: '.gallery-item',
        });
    }

    // Background
    $("[data-background]").each(function () {
        var me = $(this);
        me.css({
            backgroundImage: 'url(' + me.data('background') + ')'
        });
    });

    // Custom Tab
    $("[data-tab]").each(function () {
        var me = $(this);

        me.click(function () {
            if (!me.hasClass('active')) {
                var tab_group = $('[data-tab-group="' + me.data('tab') + '"]'),
                    tab_group_active = $('[data-tab-group="' + me.data('tab') + '"].active'),
                    target = $(me.attr('href')),
                    links = $('[data-tab="' + me.data('tab') + '"]');

                links.removeClass('active');
                me.addClass('active');
                target.addClass('active');
                tab_group_active.removeClass('active');
            }
            return false;
        });
    });

    // Bootstrap 4 Validation
    $(".needs-validation").submit(function () {
        var form = $(this);
        if (form[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.addClass('was-validated');
    });

    // alert dismissible
    $(".alert-dismissible").each(function () {
        var me = $(this);

        me.find('.close').click(function () {
            me.alert('close');
        });
    });

    if ($('.main-navbar').length) {
    }

    // Image cropper
    $('[data-crop-image]').each(function (e) {
        $(this).css({
            overflow: 'hidden',
            position: 'relative',
            height: $(this).data('crop-image')
        });
    });

    // Slide Toggle
    $('[data-toggle-slide]').click(function () {
        let target = $(this).data('toggle-slide');

        $(target).slideToggle();
        return false;
    });

    // Dismiss modal
    $("[data-dismiss=modal]").click(function () {
        $(this).closest('.modal').modal('hide');

        return false;
    });

    // Width attribute
    $('[data-width]').each(function () {
        $(this).css({
            width: $(this).data('width')
        });
    });

    // Height attribute
    $('[data-height]').each(function () {
        $(this).css({
            height: $(this).data('height')
        });
    });

    // Chocolat
    if ($('.chocolat-parent').length && jQuery().Chocolat) {
        $('.chocolat-parent').Chocolat();
    }

    // Sortable card
    if ($('.sortable-card').length && jQuery().sortable) {
        $('.sortable-card').sortable({
            handle: '.card-header',
            opacity: .8,
            tolerance: 'pointer'
        });
    }

    // Daterangepicker
    if (jQuery().daterangepicker) {
        if ($(".datepicker").length) {
            $('.datepicker').daterangepicker({
                locale: { format: 'YYYY-MM-DD' },
                singleDatePicker: true,
            });
        }
        if ($(".datetimepicker").length) {
            $('.datetimepicker').daterangepicker({
                locale: { format: 'YYYY-MM-DD HH:mm' },
                singleDatePicker: true,
                timePicker: true,
                timePicker24Hour: true,
            });
        }
        if ($(".daterange").length) {
            $('.daterange').daterangepicker({
                locale: { format: 'YYYY-MM-DD' },
                drops: 'down',
                opens: 'right'
            });
        }
    }

    // Timepicker
    if (jQuery().timepicker && $(".timepicker").length) {
        $(".timepicker").timepicker({
            icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down'
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const detailPernikahanSection = document.querySelector('.detail-pernikahan-section');
    const toggleButton = document.querySelector('#toggle-detail-pernikahan');

    if (toggleButton) {
        toggleButton.addEventListener('click', function () {
            if (detailPernikahanSection.style.display === 'none') {
                detailPernikahanSection.style.display = 'block';
            } else {
                detailPernikahanSection.style.display = 'none';
            }
        });
    }
});

document.getElementById('tanggal_pernikahan').addEventListener('change', function () {
    const date = new Date(this.value);
    const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const dayName = days[date.getUTCDay()];
    document.getElementById('hari_pernikahan').value = dayName;
});
document.getElementById('jumlah_anak').addEventListener('input', function () {
    const jumlahAnak = parseInt(this.value, 10);
    for (let i = 1; i <= 10; i++) {
        document.getElementById(`anak_${i}_fields`).style.display = i <= jumlahAnak ? 'flex' : 'none';
    }
});

"use strict";

// Fungsi untuk membuka modal alamat tergugat
function openAddressModal() {
    document.getElementById('tergugatModal').style.display = 'block';
}

// Fungsi untuk menutup modal alamat tergugat
function closeAddressModal() {
    document.getElementById('tergugatModal').style.display = 'none';
}

// Fungsi untuk menyimpan alamat tergugat
function saveAddress(event) {
    event.preventDefault();
    const form = document.getElementById('tergugatForm');
    const jalan = form.querySelector('#jalan').value;
    const no = form.querySelector('#no').value;
    const rt = form.querySelector('#rt').value;
    const rw = form.querySelector('#rw').value;
    const desa = form.querySelector('#desa').value;
    const kecamatan = form.querySelector('#kecamatan').value;
    const kabupaten = form.querySelector('#kabupaten').value;

    document.getElementById('alamat_tergugat').value = `Jalan ${jalan}, No ${no}, RT ${rt}, RW ${rw}, Desa ${desa}, Kecamatan ${kecamatan}, Kabupaten ${kabupaten}`;
    closeAddressModal();
}

// Fungsi untuk membuka modal alamat penggugat
function openPenggugatAddressModal() {
    document.getElementById('penggugatModal').style.display = 'block';
}

// Fungsi untuk menutup modal alamat penggugat
function closePenggugatAddressModal() {
    document.getElementById('penggugatModal').style.display = 'none';
}

// Fungsi untuk menyimpan alamat penggugat
function savePenggugatAddress(event) {
    event.preventDefault();
    const form = document.getElementById('penggugatForm');
    const jalan = form.querySelector('#jalan_penggugat').value;
    const no = form.querySelector('#no_penggugat').value;
    const rt = form.querySelector('#rt_penggugat').value;
    const rw = form.querySelector('#rw_penggugat').value;
    const desa = form.querySelector('#desa_penggugat').value;
    const kecamatan = form.querySelector('#kecamatan_penggugat').value;
    const kabupaten = form.querySelector('#kabupaten_penggugat').value;

    document.getElementById('alamat_penggugat').value = `Jalan ${jalan}, No ${no}, RT ${rt}, RW ${rw}, Desa ${desa}, Kecamatan ${kecamatan}, Kabupaten ${kabupaten}`;
    closePenggugatAddressModal();
}

// Fungsi untuk validasi form
"use strict";

// Fungsi untuk validasi form
function validateForm(event) {
    event.preventDefault();
    const form = document.getElementById('gugatanForm');
    const errors = {};

    const requiredFields = [
        'nama_penggugat', 'binti_penggugat', 'umur_penggugat', 'agama_penggugat',
        'pekerjaan_penggugat', 'pendidikan_penggugat', 'alamat_penggugat',
        'nama_tergugat', 'bin_tergugat', 'umur_tergugat', 'agama_tergugat',
        'pekerjaan_tergugat', 'pendidikan_tergugat', 'alamat_tergugat'
    ];

    requiredFields.forEach(field => {
        const input = form.querySelector(`[name="${field}"]`);
        if (!input.value) {
            errors[field] = `${field.replace('_', ' ')} wajib diisi.`;
            document.getElementById(`error_${field}`).textContent = errors[field];
        } else {
            document.getElementById(`error_${field}`).textContent = '';
        }
    });

    // Jika tidak ada error, submit form
    if (Object.keys(errors).length === 0) {
        form.submit();
    }
}

// Tambahkan event listener untuk menghapus pesan error saat mengetik
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('gugatanForm');
    const requiredFields = [
        'nama_penggugat', 'binti_penggugat', 'umur_penggugat', 'agama_penggugat',
        'pekerjaan_penggugat', 'pendidikan_penggugat', 'alamat_penggugat',
        'nama_tergugat', 'bin_tergugat', 'umur_tergugat', 'agama_tergugat',
        'pekerjaan_tergugat', 'pendidikan_tergugat', 'alamat_tergugat'
    ];

    requiredFields.forEach(field => {
        const input = form.querySelector(`[name="${field}"]`);
        input.addEventListener('input', function () {
            if (input.value) {
                document.getElementById(`error_${field}`).textContent = '';
            }
        });
    });
});





document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('#gugatanForm2');

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const errors = {};

        const requiredFields = [
            'hari_pernikahan', 'tanggal_pernikahan', 'desa_pernikahan', 'kecamatan_pernikahan',
            'kabupaten_pernikahan', 'nomor_akta_nikah', 'tanggal_akta_nikah', 'kecamatan_kua',
            'kabupaten_kua', 'tempat_tinggal', 'kumpul_baik_selama_tahun', 'kumpul_baik_selama_bulan',
            'jumlah_anak'
        ];

        requiredFields.forEach(field => {
            const input = form.querySelector(`[name="${field}"]`);
            const errorSpan = document.getElementById(`error_${field}`);
            if (!input || !input.value.trim()) {
                errors[field] = `${field.replace(/_/g, ' ')} wajib diisi.`;
                if (errorSpan) {
                    errorSpan.textContent = errors[field];
                }
            } else {
                if (errorSpan) {
                    errorSpan.textContent = '';
                }
            }
        });

        

        // Validasi khusus untuk jumlah anak dan tanggal lahir anak
        const jumlahAnak = parseInt(form.querySelector('[name="jumlah_anak"]').value, 10);
        for (let i = 1; i <= jumlahAnak; i++) {
            const namaAnak = form.querySelector(`[name="anak_${i}"]`);
            const tanggalLahirAnak = form.querySelector(`[name="tanggal_lahir_anak_${i}"]`);
            const errorNamaAnak = document.getElementById(`error_anak_${i}`);
            const errorTanggalLahirAnak = document.getElementById(`error_tanggal_lahir_anak_${i}`);

            if (!namaAnak.value.trim()) {
                errors[`anak_${i}`] = `Nama anak ke-${i} wajib diisi.`;
                if (errorNamaAnak) {
                    errorNamaAnak.textContent = errors[`anak_${i}`];
                }
            } else {
                if (errorNamaAnak) {
                    errorNamaAnak.textContent = '';
                }
            }

            if (!tanggalLahirAnak.value.trim()) {
                errors[`tanggal_lahir_anak_${i}`] = `Tanggal lahir anak ke-${i} wajib diisi.`;
                if (errorTanggalLahirAnak) {
                    errorTanggalLahirAnak.textContent = errors[`tanggal_lahir_anak_${i}`];
                }
            } else {
                if (errorTanggalLahirAnak) {
                    errorTanggalLahirAnak.textContent = '';
                }
            }
        }

        // Tampilkan pesan error jika ada
        if (Object.keys(errors).length === 0) {
            form.submit();
        }




    });
});

function showTextarea() {
    var select = document.getElementById('alasan_perselisihan');
    var textareaContainer = document.getElementById('textarea-container');
    if (select.value) {
        textareaContainer.style.display = 'block';
    } else {
        textareaContainer.style.display = 'none';
    }
}

document.getElementById('tempat_tinggal').addEventListener('change', function() {
    var desaInput = document.getElementById('desa_input');
    var lainnyaTextarea = document.getElementById('lainnya_textarea');
    var selectedValue = this.value;

    if (selectedValue === 'lainnya') {
        desaInput.style.display = 'block';
        lainnyaTextarea.style.display = 'block';
    } else if (selectedValue) {
        desaInput.style.display = 'block';
        lainnyaTextarea.style.display = 'none';
    } else {
        desaInput.style.display = 'none';
        lainnyaTextarea.style.display = 'none';
    }
});
