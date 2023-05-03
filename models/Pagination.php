
<?php

?>

<?php

class Pagination
{

    public int $pageIndex;
    public int $pageSize;
    public int  $totalPage;
    public array $data;
    function __construct(int $pageIndex, int $pageSize, int $totalPage, array $data)
    {
        $this->pageIndex = $pageIndex;
        $this->pageSize = $pageSize;
        $this->totalPage = $totalPage;
        $this->data =  $data;
    }
}
