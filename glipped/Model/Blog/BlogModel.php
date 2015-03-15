<?php
class Blog
{
    public $tablename = "t_blog";
    public $Blog_OBJ = array("BlogId"=>"","BlogTitle"=>"","BlogDescription"=>"","BlogDateTime"=>"",
        "UserId"=>"","ContantType"=>"","ContantPath"=>"","IsVisible"=>"","BlogLike"=>"","Keyword"=>"");

    public static function Save($Blogdescription,$UserId,$ContantType,$ContantPath)
    {
        $Query = "INSERT INTO t_blog (BlogTitle, BlogDescription, BlogDateTime, UserId, ContantType,ContantPath, IsVisible, BlogLike, Keyword) VALUES ('','$Blogdescription','".date('Y-m-d h:i:sa')."',$UserId,'$ContantType','$ContantPath','YES',0,'')";
        //echo $Query;
        return DBConnection::InsertQuery($Query);
    }
    public static function GetUserBlog($UserId)
    {
        $Query = "select blg.*,lgn.UserName,lgn.UserType from t_blog as blg
inner join t_login as lgn on blg.UserId = lgn.LoginId
where blg.UserId = $UserId and blg.IsVisible = 'YES' ORDER BY blg.BlogId DESC";
        $result = DBConnection::SelectQuery($Query);
        return self::FillBlogData($result);
    }
    public static function GetBlog($BlogId)
    {
        $Query = "select blg.*,lgn.UserName,lgn.UserType from t_blog as blg
inner join t_login as lgn on blg.UserId = lgn.LoginId
where blg.BlogId = $BlogId and blg.IsVisible = 'YES' ORDER BY blg.BlogId DESC";
        $result = DBConnection::SelectQuery($Query);
        return self::FillBlogData($result);
    }
    public static function FillBlogData($result)
    {
        $counter = 0;
        if(mysql_num_rows($result) > 0)
        {
            while($row = mysql_fetch_row($result))
            {
                $data[$counter] = array('BlogId'=>$row[0],'BlogTitle'=>$row[1],'BlogDescription'=>$row[2],
                    'BlogDateTime'=>$row[3],'User'=>  LoginModel::GetUser("LOGINID", $row[4]),'ContantType'=>$row[5],'ContantPath'=>$row[6],
                    'BlogLike'=>  BlogLike::ActionBlogLike("GETALLCOUNT", $row[0], 0),'UserName'=>$row[10],'UserType'=>$row[11]);
                $counter++;
            }
            return $data;
        }
    }
}

class BlogLike
{
    public $tablename = "t_blog_like";
    public $Blog_OBJ = array("BlogID"=>"","UserID"=>"");
    
    public static function ActionBlogLike($ActionName,$BlogID,$UserID)
    {
        $Query = "";
        switch ($ActionName)
        {
            case "LIKE":
                $Query = "insert into t_blog_like (BlogID, UserID) values ($BlogID,$UserID);";
                return DBConnection::InsertQuery($Query);
                break;
            case "UNLIKE":
                $Query = "delete from t_blog_like where BlogID = $BlogID AND UserID = $UserID;";
                return DBConnection::DeleteQuery($Query);
                break;
            case "USERLIKE":
                $Query = "select * from t_blog_like where BlogID = $BlogID AND UserID = $UserID;";
                $result = DBConnection::SelectQuery($Query);
                $counter = 0;
                if(mysql_num_rows($result) > 0)
                {
                    while($row = mysql_fetch_row($result))
                    {
                        $data[$counter] = array('BlogID'=>$row[0],'UserID'=>$row[1]);
                        $counter++;
                    }
                    return $data;
                }
                break;
            case "GETALLLIKE":
                $Query = "select * from t_blog_like where BlogID = $BlogID;";
                $result = DBConnection::SelectQuery($Query);
                $counter = 0;
                if(mysql_num_rows($result) > 0)
                {
                    while($row = mysql_fetch_row($result))
                    {
                        $data[$counter] = array('BlogID'=>$row[0],'UserID'=>$row[1]);
                        $counter++;
                    }
                    return $data;
                }
                break;
            case "GETALLCOUNT":
                $Query = "select count(*) as totlike from t_blog_like where BlogID = $BlogID;";
                $result = DBConnection::SelectQuery($Query);
                $row = mysql_fetch_array($result,MYSQL_ASSOC);
                return $row["totlike"];
                break;
        }
    }
}