<html>
    <?php require_once 'parts/header.php' ?>
    <body>
      <?php require_once 'parts/navibar.php' ?>
      <script lang="javascript">
        function submitUserHand(hand) {
            document.querySelector("#user_hand").value = hand;
            document.querySelector("#select_hand_form").submit();
        }
      </script>
        <div class="container">
            <div>
                <div class="fs-2 blue text-danger">○○さんの勝ち</div>
                <div class="fs-4">n回のうち、n回勝ちました</div>
            </div>
        <div class="d-flex justify-content-center align-items-center flex-column mt-2">
            <div class="border rounded p-3 mt-2">
                <img src="images/janken_choki.png" width="100" class="rounded" />
            </div>
            <div class="d-flex justify-content-center fs-2 mt-1 mb-1">
                VS
            </div>
            <div class="border rounded p-3">
                <img src="images/janken_gu.png" width="100" class="rounded" />
            </div>
        </div>
        <form method="post" action="game.php" id="select_hand_form">
            <input type="hidden" name="user_hand" id="user_hand">
            <div class="d-flex justify-content-evenly mt-5">
                <button class="btn btn-outline-primary" onclick="submitUserHand('scissors');">
                    <img src="images/janken_choki.png" width="80" class="rounded" />
                </button>
                <button class="btn btn-outline-primary" onclick="submitUserHand('paper')">
                    <img src="images/janken_pa.png" width="80" class="rounded" />
                </button>
            </div>
        </form>
        </div>
</body>
</html>