<?php

    if ($total_pages > 1) { ?>
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="?page=1">Перша</a>
                </li>

                <?php if($page <= 1 && $page != $total_pages): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $page; ?>"><?= $page; ?></a></li>
                    <?php for($i = 1; $i <= 1; $i++): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?= ($page + $i); ?>"><?= ($page + $i); ?></a></li>
                    <?php endfor; ?>
                <?php else: ?>
                    <?php for($i = 1; $i >= 1; $i--): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?= ($page - $i); ?>"><?= ($page - $i); ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item"><a class="page-link"  href="?page=<?= $page; ?>"><?= $page; ?></a></li>
                    <?php if($page == $total_pages): ?>
                    <?php else: ?>
                        <?php for($i = 1; $i <= 1; $i++): ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= ($page + $i); ?>"><?= ($page + $i); ?></a></li>
                        <?php endfor; ?>
                    <?php endif; ?>
                <?php endif; ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $total_pages?>">Остання</a>
                </li>
            </ul>
        </nav>
    <?php } ?>
