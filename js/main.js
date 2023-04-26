
function show_category() {
  location.reload();
  document.getElementById('category').style.display = "flex";
  document.getElementById('product').style.display = "none";
  document.getElementById('list-donhang').style.display = "none";
  document.getElementById('chi_tiet_don_hang').style.display = "none";
  document.getElementById('list-thongke').style.display = "none"; 
  document.getElementById('list_ho_tro').style.display = "none";

}
function show_product() {
  document.getElementById('category').style.display = "none";
  document.getElementById('product').style.display = "block";
  document.getElementById('list-donhang').style.display = "none";
  document.getElementById('chi_tiet_don_hang').style.display = "none";
  document.getElementById('list-thongke').style.display = "none"; 
  document.getElementById('list_ho_tro').style.display = "none";
}
function show_donhang() {
  document.getElementById('category').style.display = "none";
  document.getElementById('product').style.display = "none";
  document.getElementById('list-donhang').style.display = "block";
  document.getElementById('chi_tiet_don_hang').style.display = "block"; 
  document.getElementById('list-thongke').style.display = "none"; 
  document.getElementById('list_ho_tro').style.display = "none"; 
}

function show_hotro() {
  document.getElementById('category').style.display = "none";
  document.getElementById('product').style.display = "none";
  document.getElementById('list-donhang').style.display = "none";
  document.getElementById('list-thongke').style.display = "none"; 
  document.getElementById('list_ho_tro').style.display = "block"; 
}

function show_thongke() {
  document.getElementById('category').style.display = "none";
  document.getElementById('product').style.display = "none";
  document.getElementById('list-donhang').style.display = "none";
  document.getElementById('list-thongke').style.display = "block"; 
  document.getElementById('list_ho_tro').style.display = "none"; 
}

function reload() {
  location.reload();
  return false;
}

