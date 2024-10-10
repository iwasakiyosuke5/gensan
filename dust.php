もしも生書きのページネーションを行おうと思ったら,,,
<!-- １.  データベース接続を設定する　省略-->
<!-- 2. ページネーションのための設定を行う-->
    <?php
    $limit = 5; // 1ページあたりのレコード数
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // 現在のページ番号
    $offset = ($page - 1) * $limit; // オフセットの計算
    $search = isset($_GET['search']) ? $_GET['search'] : ''; // 検索クエリ

    // 総レコード数を取得する
    $sql = 'SELECT COUNT(*) FROM kaizen_proposals';
    if ($search) {
        $sql .= ' WHERE title LIKE :search OR name LIKE :search OR approvalStage LIKE :search';
    }
    $stmt = $pdo->prepare($sql);
    if ($search) {
        $stmt->bindValue(':search', '%' . $search . '%');
    }
    $stmt->execute();
    $total = $stmt->fetchColumn();
    $total_pages = ceil($total / $limit);
    ?>
<!-- 3. データを取得する -->
    <?php
    $sql = 'SELECT * FROM kaizen_proposals';
    if ($search) {
        $sql .= ' WHERE title LIKE :search OR name LIKE :search OR approvalStage LIKE :search';
    }
    $sql .= ' ORDER BY idKP DESC LIMIT :limit OFFSET :offset';
    $stmt = $pdo->prepare($sql);
    if ($search) {
        $stmt->bindValue(':search', '%' . $search . '%');
    }
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
<!-- 4.データを表示する  -->
    <?php foreach ($posts as $post): ?>
        <div>
            <h2><?php echo htmlspecialchars($post['title']); ?></h2>
            <p><?php echo htmlspecialchars($post['name']); ?></p>
            <p><?php echo htmlspecialchars($post['approvalStage']); ?></p>
            <!-- 他の必要な情報をここに表示 -->
        </div>
    <?php endforeach; ?>
<!-- 5.ページリンクを生成する -->
    <div>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>

以上
