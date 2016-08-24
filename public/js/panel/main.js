/* global $ */
/* global google */

/* general */
$('.btn').attr('tabindex', '0');

function confirmAction(sure_delete) {
  return confirm(sure_delete);
}

function changeProvinceSelect(provincesForEachCountry, selectedProvinceId = null) {
  var provinceId, countryId = $('#country_id').val();
  provincesForEachCountry = $.parseJSON(provincesForEachCountry);

  $('#province_id > option').addClass('no-display');

  for (var i = 0; i < provincesForEachCountry.length; i++) {
    if (provincesForEachCountry[i][0] == countryId) {
      for (var j = 1; j < provincesForEachCountry[i].length; j++) {
        provinceId = provincesForEachCountry[i][j];
        $('#province_id > option[value= ' + provinceId + ']').removeClass('no-display');
      }
    }
  }

  $('#province_id > option:first-child').removeClass('no-display');
  if (selectedProvinceId) {
    $('#province_id').val(selectedProvinceId);
  }
  else {
    $('#province_id').val('');
  }
}


/* people.index */

function toggleFilterNavbar() {
  if ($('#filter-navbar').hasClass('no-display')) {
    $('#filter-navbar').removeClass('no-display');
  }
  else {
    $('#filter-navbar').addClass('no-display');
  }
}

function orderByRedirect(url, search, paginate) {
  search = (search != '') ? '&search=' + search : '';
  paginate = (paginate != '') ? '&paginate=' + paginate : '';
  urlToRedirect = url + '?order-by=' + $('#order-by-select').val() + search + paginate;
  location.href = urlToRedirect;
}

function searchRedirect(url, orderBy, paginate) {
  orderBy = (orderBy != '') ? '&order-by=' + orderBy : '';
  paginate = (paginate != '') ? '&paginate=' + paginate : '';
  urlToRedirect = url + '?search=' + $('#search').val() + orderBy + paginate;
  location.href = urlToRedirect;
}

function paginateRedirect(url, orderBy, search) {
  orderBy = (orderBy != '') ? '&order-by=' + orderBy : '';
  search = (search != '') ? '&search=' + search : '';
  urlToRedirect = url + '?paginate=' + $('#paginate-select').val() + orderBy + search;
  location.href = urlToRedirect;
}


/* people._form */


$(document).ready(function() {
  $('input[type=radio][name=status]').change(function() {
    changeDatesFromStatus(this.value);
  });
});

function changeDatesFromStatus(status) {
  switch (status) {
    case 'missing_to_validate':
    case 'missing':
      $('#missing-at').removeClass('no-display');
      $('#found-at').addClass('no-display');
      $('#closure-at').addClass('no-display');
      break;
    case 'found_to_validate':
    case 'found':
      $('#missing-at').addClass('no-display');
      $('#found-at').removeClass('no-display');
      $('#closure-at').addClass('no-display');
      break;
    case 'missing_found_with_life':
    case 'missing_found_without_life':
      $('#missing-at').removeClass('no-display');
      $('#found-at').addClass('no-display');
      $('#closure-at').removeClass('no-display');
      break;
    case 'found_refound':
      $('#missing-at').addClass('no-display');
      $('#found-at').removeClass('no-display');
      $('#closure-at').removeClass('no-display');
      break;
    case 'closed':
      $('#missing-at').removeClass('no-display');
      $('#found-at').removeClass('no-display');
      $('#closure-at').removeClass('no-display');
      break;
  }
}

/* people.show */
function launchEditor(id, src) {
  featherEditor.launch({
    image: id,
    url: src
  });
  return false;
}


/* people.comments */

function editComment(id, description) {
  $('#comment-form').addClass('no-display');
  $('#edit-comment-form').removeClass('no-display');
  $('#edit-comment-id').val(id);
  $('#edit-comment-description').val(description);
}


/* starts people.maps */

function initMap(type, lat, lng) {
  lat = parseFloat(lat);
  lng = parseFloat(lng);
  if (type == 'show') {
    setShowMarker(lat, lng);
  }
  if (type == 'modal') {
    $('#enlarge-map-modal').css('display', 'block');
    $('#modal-map').height($(window).height() - $('.modal-header').height() - $('.modal-footer').height() - 150);
    setShowMarker(lat, lng, 'modal-map');
  }
  if (type == 'edit') {
    if (lat && lng) {
      setEditMarker(lat, lng);
    }
    else {
      $('#map').addClass('no-display');
      setEditMarker(0, 0);
    }
    $('#map').height($(window).height() - $('.navbar').height() - $('#send-coordinates-form').height() - $('#input-group-address').height() - 80);
  }
}

function addressToCoordinates(address) {
  var address = (!address) ? $('#address').val() : address;
  var geocoder = new google.maps.Geocoder();
  geocoder.geocode({
    'address': address
  }, geocodeResult);
}

function geocodeResult(results, status) {
  if (status == 'OK') {
    $('#map').removeClass('no-display');
    $('#map-not-found').addClass('no-display');
    $('#send-coordinates-form').removeClass('no-display');

    var lat = results[0].geometry.location.lat();
    var lng = results[0].geometry.location.lng();

    setEditMarker(lat, lng);
  }
  else {
    $('#map').addClass('no-display');
    $('#map-not-found').removeClass('no-display');
    $('#send-coordinates-form').addClass('no-display');
  }
}

function setEditMarker(lat, lng) {
  var latLng = {
    lat,
    lng
  };
  var coordsLenght = 6;
  var zoom = 12;

  var map = new google.maps.Map($('#map').get(0), {
    center: latLng,
    zoom: zoom
  });

  var marker = new google.maps.Marker({
    map: map,
    position: latLng,
    draggable: true
  });

  writeCoordinates(lat, lng);

  google.maps.event.addListener(marker, 'dragend', function(evt) {
    var lat = evt.latLng.lat().toFixed(coordsLenght);
    var lng = evt.latLng.lng().toFixed(coordsLenght);
    writeCoordinates(lat, lng);
    $('#send-coordinates-form').removeClass('no-display');
  });
}

function setShowMarker(lat, lng, map) {
  map = map || 'map'
  var latLng = {
    lat,
    lng
  };

  var options = {
    center: latLng,
    zoom: 12
  };

  var map = new google.maps.Map($('#' + map).get(0), options);

  var marker = new google.maps.Marker({
    map: map,
    position: latLng,
  });
}

function writeCoordinates(lat, lng) {
  $('#latitude').val(lat);
  $('#longitude').val(lng);
}


/* starts contact-details */

function toggleSameEmail() {
  if ($('#same-email-input').prop('checked')) {
    $('#private_email').val($('#public_email').val());
  }
  else {
    $('#private_email').val('');
  }
}


/* starts users */

function changeUsersHierarchySelect(locationMode) {
  if ($('#hierarchy').val() == 2) {
    $('#country-select').removeClass('no-display');
  }
  else {
    $('#country-select').addClass('no-display');
  }

  if ($('#hierarchy').val() == 3) {
    $('#province-select').removeClass('no-display');
    if (locationMode == 'countries') {
      $('#country-select').removeClass('no-display');
    }
  }
  else {
    $('#province-select').addClass('no-display');
    if ($('#hierarchy').val() != 2) {
      $('#country-select').addClass('no-display');
    }
  }
}