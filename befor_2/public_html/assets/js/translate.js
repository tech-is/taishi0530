/**
 *  GT Translate 1.1.0
 */
(function() {
  var translateScriptElement;
  if (document.currentScript) {
    translateScriptElement = document.currentScript;
  } else {
    var scripts = document.getElementsByTagName('script');
    translateScriptElement = scripts[scripts.length-1];
  }

  var langs = {
    ja: {dir:'jp', label:'日本語'},
    en: {dir:'us', label:'English'},
    ko: {dir:'kr', label:'한국어'},
    cn: {dir:'cn', label:'简体中文'},
    tw: {dir:'tw', label:'繁體中文'}
  };

  function jump(lang) {
    var path = '/';
    var regex = /\/(us|kr|cn|tw)\/.*$/;
    var pathname = location.pathname;
    if (location.protocol == 'https:' && location.host == 'ssl.xaas.jp') {
      path = 'http://' + pathname.split('/')[1] + '/';
      if (lang != 'jp') {
        path += lang;
      }
      location.assign(path);
      return;
    }
    if (lang != 'jp') {
      path += lang;
    }
    location.assign(path);
  }

  function build() {
    var data = $(translateScriptElement).data();
    var selectLangs = data.lang.split(',');
    var selectColor = data.color || 'white';

    var $styledSelect  = $('<div class="select-styled">'),
        $list          = $('<div class="select-options">');

    $(translateScriptElement).after(
      $('<div class="translate_gt '+ selectColor +'">').append(
        $('<div class="select">').append($styledSelect, $list)
      )
    );

    for (var i = 0; i < selectLangs.length; i++) {
      var lang = langs[selectLangs[i]];
      var $listItem = $('<div>', {
        text : lang.label,
        rel  : lang.dir,
        class: 'select-option-item'
      }).appendTo($list);
      if (location.pathname.indexOf('/' + lang.dir + '/') !== -1) {
        $listItem.addClass('selected');
      }
    }

    var $initialSelected = $list.children('.selected');
    if (!$initialSelected.length) { // Japanese
      $initialSelected = $list.children(':first');
      $initialSelected.addClass('selected');
      if (data.default) {
        $styledSelect.text(data.default).addClass('blank').parent().addClass('long');
      } else {
        $styledSelect.text($initialSelected.text()).attr('rel', $initialSelected.attr('rel'));
      }
    } else {
      $styledSelect.text($initialSelected.text()).attr('rel', $initialSelected.attr('rel'));
    }

    $styledSelect.click(function(e) {
      e.stopPropagation();
      if ($(this).hasClass('active')) {
        $(this).removeClass('active').next('.select-options').slideUp('fast');
        return;
      }
      $('div.select-styled.active').each(function(){
        $(this).removeClass('active').next('.select-options').hide();
      });
      $(this).addClass('active').next('.select-options').slideDown('fast');
    });

    $list.children().click(function(e) {
      e.stopPropagation();
      var $selected = $(this);
      var lang = $selected.attr('rel');
      $styledSelect.text($selected.text()).attr('rel', lang).removeClass('active blank');
      jump(lang);
      $list.slideUp('fast', function() {
        $list.find('.selected').removeClass('selected');
        $selected.addClass('selected');
      });
    });

    $(document).click(function() {
      $styledSelect.removeClass('active');
      $list.hide();
    });
  }

  var timer = setInterval(function() {
    if (typeof jQuery !== 'undefined') {
      clearInterval(timer);
      build();
    }
  }, 200);

})();
