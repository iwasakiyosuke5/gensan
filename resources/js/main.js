/*----------
mypageDetailの設定
----------*/
// UpdateボタンのクリックでFormを送信させる
function submitForm() {
  document.getElementById('edit').submit();
}
document.addEventListener('DOMContentLoaded', function () {
  var tableBody = document.getElementById('latestProposalsTable').querySelector('tbody');

  // chartDataが定義されているか確認
  if (typeof chartData !== 'undefined') {
    // テーブル行を生成
    chartData.forEach(function (item) {
      var row = document.createElement('tr');

      var cellDate = document.createElement('td');
      cellDate.className = 'border border-black px-4 py-2';
      cellDate.textContent = item.date;
      row.appendChild(cellDate);

      var cellName = document.createElement('td');
      cellName.className = 'border border-black px-4 py-2';
      cellName.textContent = item.name; // 仮にnameフィールドが存在する場合
      row.appendChild(cellName);

      var cellTitle = document.createElement('td');
      cellTitle.className = 'border border-black px-4 py-2';
      cellTitle.textContent = item.title;
      row.appendChild(cellTitle);

      tableBody.appendChild(row);
    });
  }
});
