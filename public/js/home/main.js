/* general */

var days, actualStep = 1;

$('.ui.button').attr('tabindex', '0');

var personFields = [
  [],
  ['name', 'surname', 'birth_year', 'characteristics', 'gender'],
  [],
  ['province_id', 'area'],
  ['year', 'month'],
  [],
  ['reporter[reporter_name]', 'reporter[relationship]', 'reporter[phone]', 'reporter[email]'],
]

var contributionFields = ['characteristics', 'province_id', 'contributor[name]', 'contributor[phone]']

function checkMobile() {
  var check = false;
  (function(a) {
    if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true
  })(navigator.userAgent || navigator.vendor || window.opera);
  return check;
}

function validateEmail(email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

/* people.index */

function toggleSidebar() {
  $('.sidebar')
    .sidebar('push page')
  ;
}

/* people.show */

function facebookPublish(url) {
  window.open('https://www.facebook.com/dialog/share?app_id=145634995501895&display=wap&href=' + url, '_blank');
}

function twitterPublish(url, hashtags, lookingFor, location, helpDiffusion) {
  var text;
  if (27 + hashtags.length + lookingFor.length + location.length + helpDiffusion.length < 140) {
    text = lookingFor + ' ' + location + ' ' + helpDiffusion;
  }
  else {
    text = lookingFor + ' ' + helpDiffusion;
  }
  url = encodeURIComponent(url);
  text = encodeURIComponent(text);
  var completeUrl = 'https://twitter.com/share?url=' + url + '&hashtags=' + hashtags + '&text=' + text;
  if (checkMobile()) {
    alert(completeUrl)
    window.open(completeUrl);
  }
  else {
    window.open(completeUrl, '_blank');
  }
}

function print(url) {
  var printWindow = window.open(url, '_blank');
  printWindow.onload = function() {
    var isIE = /(MSIE|Trident\/|Edge\/)/i.test(navigator.userAgent);
    if (isIE) {

      printWindow.print();
      setTimeout(function() {
        printWindow.close();
      }, 100);

    }
    else {

      setTimeout(function() {
        printWindow.print();
        var ival = setInterval(function() {
          printWindow.close();
          clearInterval(ival);
        }, 200);
      }, 500);
    }
  }
}


/* people.create */

function changeProvinceSelect() {
  $('#province_id > option').addClass('no-display');
  $('#province_id > #option' + $('#country_id').val()).removeClass('no-display');
  $('#province_id > #placeholder').removeClass('no-display');
  $('#province_id').val('');
}

function updateDays(selectOneDay) {
  var year = $('#year').val();
  var month = $('#month').val();
  var daysInMonth = new Date(year, month, 1, -1).getDate();

  days = '<option selected="selected" value>' + selectOneDay + '</option>'
  for (var i = 1; i <= daysInMonth; i++) {
    days += '<option value=' + i + '>' + i + '</option>';
  }
  $('#day')
    .empty()
    .append(days);
  days = null;
}

function toggleInputDisease(action) {
  if (action == 'enable') {
    $('#field-disease').removeClass('no-display');
  }
  else {
    $('#field-disease').addClass('no-display');
  }
}

function nextStep(errorMessage, manyErrorsMessage, emailErrorMessage) {
  var isValid = true;
  var manyErrors = false;
  var errorField;

  for (var i = 0; i < personFields[actualStep].length; i++) {
    if ($('[name="' + personFields[actualStep][i] + '"]').val() == '') {
      if (isValid) {
        isValid = false;
      }
      else {
        manyErrors = true;
      }
    }
  }

  if (actualStep == 6) {
    isValid = validateEmail($('[name="' + personFields[6][3] + '"]').val());
    errorField = personFields[6][3];
  }

  if (isValid) {
    actualStep++;
    if (actualStep == 6) {
      $('#continue-button').removeClass('blue');
      $('#continue-button').addClass('green');
      $('#continue-button').text('Send');
    }
    if (actualStep != 7) {
      $('#step' + (actualStep - 1)).addClass('no-display');
      $('#step' + actualStep).removeClass('no-display');
    }
  }
  else {
    if (manyErrors) {
      if ($('#step' + actualStep + ' > .error-message').html() != manyErrorsMessage) {
        if ($('#step' + actualStep + ' > .error-message').length > 0) {
          $('#step' + actualStep + ' > .error-message').text(manyErrorsMessage);
        }
        else {
          $('#step' + actualStep + ' > h3').after('<h3 class="error-message">' + manyErrorsMessage + '</h3>');
        }
      }
    }
    else if (errorField == 'reporter[email]') {
      if ($('#step' + actualStep + ' > .error-message').html() != emailErrorMessage) {
        if ($('#step' + actualStep + ' > .error-message').length > 0) {
          $('#step' + actualStep + ' > .error-message').text(emailErrorMessage);
        }
        else {
          $('#step' + actualStep + ' > h3').after('<h3 class="error-message">' + emailErrorMessage + '</h3>');
        }
      }
    }
    else {
      if ($('#step' + actualStep + ' > .error-message').html() != errorMessage) {
        if ($('#step' + actualStep + ' > .error-message').length > 0) {
          $('#step' + actualStep + ' > .error-message').text(errorMessage);
        }
        else {
          $('#step' + actualStep + ' > h3').after('<h3 class="error-message">' + errorMessage + '</h3>');
        }
      }
    }
  }

  if (actualStep == 7 && isValid) {
    $('#person-form').submit();
  }
}

$('#person-form #continue-button').keypress(function(e) {
  if (e.keyCode == 13) {
    $(this).click();
  }
});

/* contribution.create */
function sendContribution(errorMessage, manyErrorsMessage) {
  isValid = true;
  manyErrors = false;
  for (var i = 0; i < contributionFields.length; i++) {
    if ($('[name="' + contributionFields[i] + '"]').val() == '') {
      if (isValid) {
        isValid = false;
      }
      else {
        manyErrors = true;
      }
    }
  }
  if (isValid) {
    $('#contribution-form').submit();
  }
  else {
    if (manyErrors) {
      $('#error-message').text(manyErrorsMessage);
    }
    else {
      $('#error-message').text(errorMessage);
    }
  }
}

/* suggestion.create */
function sendSuggestion(emailErrorMessage, descriptionErrorMessage) {
  var email = $('[name="email"]').val();
  var description = $('[name="description"]').val();
  if (description == '') {
    $('#error-message').text(descriptionErrorMessage);
  }
  else if (email != '' && !validateEmail(email)) {
    $('#error-message').text(emailErrorMessage);
  }
  else {
    $('#suggestion-form').submit();
  }
}