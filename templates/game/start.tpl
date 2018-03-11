{extends 'base.tpl'}


{block 'body'}
    <center>
        <form action="/game/start/" method="POST">
            Player 1:
            <input type="text" name="P1_name">
            Player 2:
            <input type="text" name="P2_name">
            <br />
            <br />
            <input type="submit" name="start">
        </form>
    </center>



{/block}

