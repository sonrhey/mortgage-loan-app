let buttonName = "";
let oldClass = "";

$('[name="description"]').on('keyup', function() {
  const description = this.value;
  buttonName = description;
  $('[name="slug"]').val(slugify(description));
  $('.config-preview').html(description);
});

$('[name="class_name"]').on('change', function() {
  $('.config-preview').removeClass(oldClass).addClass(this.value);
  oldClass = this.value;
});

$(document).on('click', '.btn-edit', function() {
  const parent = $(this).closest('tr').find("td");
  $('[name="class_name"]').val(parent.eq(3).text());
  $('[name="description"]').val(parent.eq(1).text());
  $('[name="base_url"]').val(parent.eq(2).text());
  $('[name="slug"]').val(parent.eq(4).text());
  $('[name="is_enabled"]').val(parent.eq(5).text());
  $('[name="description"]').trigger('keyup');
  $('[name="class_name"]').trigger('change');

  $('#form > [name="_method"]').val('PUT');
  $('#form').prop('action', `/calculator-type/${parent.eq(0).text()}`);
  $('.save').html('Update');
});

const slugify = str =>
str
  .toLowerCase()
  .trim()
  .replace(/[^\w\s-]/g, '')
  .replace(/[\s_-]+/g, '-')
  .replace(/^-+|-+$/g, '');