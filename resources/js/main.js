/*----------
mypageDetailの設定
----------*/
// UpdateボタンのクリックでFormを送信させる
const update = document.getElementById('update');
update.addEventListener('click',()=>{
  document.getElementById('edit').submit();
});