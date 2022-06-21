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

const slugify = str =>
str
  .toLowerCase()
  .trim()
  .replace(/[^\w\s-]/g, '')
  .replace(/[\s_-]+/g, '-')
  .replace(/^-+|-+$/g, '');