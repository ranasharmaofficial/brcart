<?php

class Home_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->proTable = 'products';
        // Load cart library
        $this->load->library('cart');

    }
    /*
    function get_categories()
    {
    $query = $this->db->get('categories');
    $return = array();

    foreach ($query->result() as $category)
    {
    $return[$category->id] = $category;
    $return[$category->id]->subs = $this->get_sub_categories($category->id); // Get the categories sub categories
    }

    return $return;
    }

    function get_sub_categories($category_id)
    {
    $this->db->where('category_id', $category_id);
    $query = $this->db->get('subcategories');
    return $query->result();
    }
     */

    /*-Grocery Cat find start--*/

    public function get_grocery_categories()
    {
        $query = $this->db->where('category_id', '29');
        $query = $this->db->get('subcategories');
        $return = array();

        foreach ($query->result() as $subcategory) {
            $return[$subcategory->id] = $subcategory;
            $return[$subcategory->id]->childsubs = $this->get_childcat_categories($subcategory->id); // Get the categories sub categories
        }

        return $return;
    }

    public function get_childcat_categories($subcategory_id)
    {
        $this->db->where('subcategory_id', $subcategory_id);
        $query = $this->db->get('childcategories');
        return $query->result();
    }

    /*-Grocery Cat find end--*/

    /*-Books Cat find start--*/

    public function get_books_categories()
    {
        $query = $this->db->where('category_id', '25');
        $query = $this->db->get('subcategories');
        $return = array();

        foreach ($query->result() as $subcategory) {
            $return[$subcategory->id] = $subcategory;
            $return[$subcategory->id]->childsubs = $this->get_childcat_categories($subcategory->id); // Get the categories sub categories
        }

        return $return;
    }

    public function get_books_childcat_categories($subcategory_id)
    {
        $this->db->where('subcategory_id', $subcategory_id);
        $query = $this->db->get('childcategories');
        return $query->result();
    }

    /*-Books Cat find end--*/

    /*-health Cat find start--*/

    public function get_health_categories()
    {
        $query = $this->db->where('category_id', '24');
        $query = $this->db->get('subcategories');
        $return = array();

        foreach ($query->result() as $subcategory) {
            $return[$subcategory->id] = $subcategory;
            $return[$subcategory->id]->childsubs = $this->get_childcat_categories($subcategory->id); // Get the categories sub categories
        }

        return $return;
    }

    public function get_health_childcat_categories($subcategory_id)
    {
        $this->db->where('subcategory_id', $subcategory_id);
        $query = $this->db->get('childcategories');
        return $query->result();
    }

    /*-health Cat find end--*/

    /*-fashion Cat find start--*/

    public function get_fashion_categories()
    {
        $query = $this->db->where('category_id', '23');
        $query = $this->db->get('subcategories');
        $return = array();

        foreach ($query->result() as $subcategory) {
            $return[$subcategory->id] = $subcategory;
            $return[$subcategory->id]->childsubs = $this->get_childcat_categories($subcategory->id); // Get the categories sub categories
        }

        return $return;
    }

    public function get_fashion_childcat_categories($subcategory_id)
    {
        $this->db->where('subcategory_id', $subcategory_id);
        $query = $this->db->get('childcategories');
        return $query->result();
    }

    /*-fashion Cat find end--*/

    /*-beauty Cat find start--*/

    public function get_beauty_categories()
    {
        $query = $this->db->where('category_id', '22');
        $query = $this->db->get('subcategories');
        $return = array();

        foreach ($query->result() as $subcategory) {
            $return[$subcategory->id] = $subcategory;
            $return[$subcategory->id]->childsubs = $this->get_childcat_categories($subcategory->id); // Get the categories sub categories
        }

        return $return;
    }

    public function get_beauty_childcat_categories($subcategory_id)
    {
        $this->db->where('subcategory_id', $subcategory_id);
        $query = $this->db->get('childcategories');
        return $query->result();
    }

    /*-beauty Cat find end--*/

    /*-sport Cat find start--*/

    public function get_sport_categories()
    {
        $query = $this->db->where('category_id', '21');
        $query = $this->db->get('subcategories');
        $return = array();

        foreach ($query->result() as $subcategory) {
            $return[$subcategory->id] = $subcategory;
            $return[$subcategory->id]->childsubs = $this->get_childcat_categories($subcategory->id); // Get the categories sub categories
        }

        return $return;
    }

    public function get_sport_childcat_categories($subcategory_id)
    {
        $this->db->where('subcategory_id', $subcategory_id);
        $query = $this->db->get('childcategories');
        return $query->result();
    }

    /*-sport Cat find end--*/

    /*-home Cat find start--*/

    public function get_home_categories()
    {
        $query = $this->db->where('category_id', '19');
        $query = $this->db->get('subcategories');
        $return = array();

        foreach ($query->result() as $subcategory) {
            $return[$subcategory->id] = $subcategory;
            $return[$subcategory->id]->childsubs = $this->get_childcat_categories($subcategory->id); // Get the categories sub categories
        }

        return $return;
    }

    public function get_home_childcat_categories($subcategory_id)
    {
        $this->db->where('subcategory_id', $subcategory_id);
        $query = $this->db->get('childcategories');
        return $query->result();
    }

    /*-home Cat find end--*/
    /*-baby Cat find start--*/

    public function get_baby_categories()
    {
        $query = $this->db->where('category_id', '18');
        $query = $this->db->get('subcategories');
        $return = array();

        foreach ($query->result() as $subcategory) {
            $return[$subcategory->id] = $subcategory;
            $return[$subcategory->id]->childsubs = $this->get_childcat_categories($subcategory->id); // Get the categories sub categories
        }

        return $return;
    }

    public function get_baby_childcat_categories($subcategory_id)
    {
        $this->db->where('subcategory_id', $subcategory_id);
        $query = $this->db->get('childcategories');
        return $query->result();
    }

    /*-baby Cat find end--*/
    /*-Automobiles Cat find start--*/

    public function get_Automobiles_categories()
    {
        $query = $this->db->where('category_id', '17');
        $query = $this->db->get('subcategories');
        $return = array();

        foreach ($query->result() as $subcategory) {
            $return[$subcategory->id] = $subcategory;
            $return[$subcategory->id]->childsubs = $this->get_childcat_categories($subcategory->id); // Get the categories sub categories
        }

        return $return;
    }

    public function get_Automobiles_childcat_categories($subcategory_id)
    {
        $this->db->where('subcategory_id', $subcategory_id);
        $query = $this->db->get('childcategories');
        return $query->result();
    }

    /*-Automobiles Cat find end--*/

    /*-Electronic Cat find start--*/

    public function get_Electronic_categories()
    {
        $query = $this->db->where('category_id', '16');
        $query = $this->db->get('subcategories');
        $return = array();

        foreach ($query->result() as $subcategory) {
            $return[$subcategory->id] = $subcategory;
            $return[$subcategory->id]->childsubs = $this->get_childcat_categories($subcategory->id); // Get the categories sub categories
        }

        return $return;
    }

    public function get_Electronic_childcat_categories($subcategory_id)
    {
        $this->db->where('subcategory_id', $subcategory_id);
        $query = $this->db->get('childcategories');
        return $query->result();
    }

    /*-Electronic Cat find end--*/

    /*-Mobile Cat find start--*/

    public function get_Mobile_categories()
    {
        $query = $this->db->where('category_id', '15');
        $query = $this->db->get('subcategories');
        $return = array();

        foreach ($query->result() as $subcategory) {
            $return[$subcategory->id] = $subcategory;
            $return[$subcategory->id]->childsubs = $this->get_childcat_categories($subcategory->id); // Get the categories sub categories
        }

        return $return;
    }

    public function get_Mobile_childcat_categories($subcategory_id)
    {
        $this->db->where('subcategory_id', $subcategory_id);
        $query = $this->db->get('childcategories');
        return $query->result();
    }

    /*-Mobile Cat find end--*/

    /*-Computer Cat find start--*/

    public function get_Computer_categories()
    {
        $query = $this->db->where('category_id', '14');
        $query = $this->db->get('subcategories');
        $return = array();

        foreach ($query->result() as $subcategory) {
            $return[$subcategory->id] = $subcategory;
            $return[$subcategory->id]->childsubs = $this->get_childcat_categories($subcategory->id); // Get the categories sub categories
        }

        return $return;
    }

    public function get_Computer_childcat_categories($subcategory_id)
    {
        $this->db->where('subcategory_id', $subcategory_id);
        $query = $this->db->get('childcategories');
        return $query->result();
    }

    /*-Computer Cat find end--*/

    public function get_categories()
    {
        $query = $this->db->order_by('id', 'DESC');
        $query = $this->db->get('categories');
        $return = array();

        foreach ($query->result() as $category) {
            $return[$category->id] = $category;
            $return[$category->id]->subs = $this->get_sub_categories($category->id); // Get the categories sub categories
        }

        foreach ($query->result() as $subcategory) {
            $return[$subcategory->id] = $subcategory;
            $return[$subcategory->id]->child = $this->get_child_categories($subcategory->id); // Get the categories sub categories
        }

        return $return;
    }

    public function get_sub_categories($category_id)
    {
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('subcategories');
        return $query->result();
    }
    public function get_child_categories($subcategory_id)
    {
        $this->db->where('subcategory_id', $subcategory_id);
        $query = $this->db->get('childcategories');
        return $query->result();
    }

    public function getHeaderLogo()
    {
        $total = 0;
        $fields = "a.header_logo as headerLogo";

        $this->db->select($fields);
        $this->db->from(TBL_LOGO . ' a');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['headerLogo'];
        }
        return $total;
    }
    public function getInvoiceLogo()
    {
        $total = 0;
        $fields = "a.invoice_logo as invoiceLogo";

        $this->db->select($fields);
        $this->db->from(TBL_LOGO . ' a');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['invoiceLogo'];
        }
        return $total;
    }

    public function getCountSlug($params = array())
    {
        $total = 0;
        $fields = "count(a.slug) as totalP";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        if (array_key_exists("slug", $params)) {
            $this->db->where('slug', $params['slug']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['totalP'];
            }
        } else {
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['totalP'];
            }
        }
        return $total;
    }

    public function getProductID($params = array())
    {
        $total = 0;
        $fields = "count(a.id) as productId";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        if (array_key_exists("slug", $params)) {
            $this->db->where('slug', $params['slug']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['productId'];
            }
        } else {
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['productId'];
            }
        }
        return $total;
    }

    public function CountPageDetailsSlug($params = array())
    {
        $total = 0;
        $fields = "count(a.slug) as totalPageSlug";
        $this->db->select($fields);
        $this->db->from(TBL_CONTENT . ' a');
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        if (array_key_exists("slug", $params)) {
            $this->db->where('slug', $params['slug']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['totalPageSlug'];
            }
        } else {
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['totalPageSlug'];
            }
        }
        return $total;
    }

    public function getCountCategory($val = array())
    {
        $total = 0;
        $fields = "count(a.id) as totalCat";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where('category_id', $val['category_id']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalCat'];
        }
        return $total;
    }

    public function getCatCount()
    {
        $total = 0;
        $fields = "count(a.id) as totalCategory";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where('a.category_id', 11);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalCategory'];
        }
        return $total;
    }

    public function selectProductId($params = array())
    {
        $total = 0;
        $fields = " (a.id) as productId";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        if (array_key_exists("slug", $params)) {
            $this->db->where('slug', $params['slug']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['productId'];
            }
        } else {
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['productId'];
            }
        }
        return $total;
    }

    public function selectCategoryId($params = array())
    {
        $total = 0;
        $fields = " (a.id) as catId";
        $this->db->select($fields);
        $this->db->from(TBL_CATEGORY . ' a');
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        if (array_key_exists("slug", $params)) {
            $this->db->where('slug', $params['slug']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['catId'];
            }
        } else {
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['catId'];
            }
        }
        return $total;
    }

    public function selectProCategoryId($params = array())
    {
        $total = 0;
        $fields = " (a.category_id) as categoryId";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        if (array_key_exists("slug", $params)) {
            $this->db->where('slug', $params['slug']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['categoryId'];
            }
        } else {
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['categoryId'];
            }
        }
        return $total;
    }

    public function selectProChildCategory($params = array())
    {
        $total = 0;
        $fields = " (a.childcategory_id) as childcategoryId";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        if (array_key_exists("slug", $params)) {
            $this->db->where('slug', $params['slug']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['childcategoryId'];
            }
        } else {
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['childcategoryId'];
            }
        }
        return $total;
    }

    public function selectProBrand($params = array())
    {
        $total = 0;
        $fields = " (a.brand) as productBrandId";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        if (array_key_exists("slug", $params)) {
            $this->db->where('slug', $params['slug']);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['productBrandId'];
            }
        } else {
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['productBrandId'];
            }
        }
        return $total;
    }

    public function getFooterLogo()
    {
        $total = 0;
        $fields = "a.footer_logo as footerLogo";
        $this->db->select($fields);
        $this->db->from(TBL_LOGO . ' a');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['footerLogo'];
        }
        return $total;
    }
    public function getFavicon()
    {
        $total = 0;
        $fields = "a.favicon as fav_Icon";
        $this->db->select($fields);
        $this->db->from(TBL_LOGO . ' a');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['fav_Icon'];
        }
        return $total;
    }
    public function getCompanyAddressDetails($postVal = array())
    {
        $result = array();
        $this->db->select("a.*");
        $this->db->from(TBL_ADDRESS . ' a');
        $this->db->order_by('id_address', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getAllSlider($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_SLIDER . ' a');
        $this->db->where('status', '2');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    // homeDisplay Start
    public function getHomeDisplayAds($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_ADS . ' a');
        $this->db->where('status', '2');
        $this->db->where('category', 'homeDisplay');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    // homeDisplay End

    // productDetaillsRight Start
    public function getproductDetailsRight($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_ADS . ' a');
        $this->db->where('status', '2');
        $this->db->where('category', 'productDetailsRight');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    // productDetaillsRight End

    // categoyHeaderAd Start
    public function getcategoyHeaderAd($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_ADS . ' a');
        $this->db->where('status', '2');
        $this->db->where('category', 'categoyHeaderAd');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    // categoyHeaderAd End

    // ClothingApparel Start
    public function getClothingApparelAds($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_ADS . ' a');
        $this->db->where('status', '2');
        $this->db->where('category', 'ClothingApparel');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    // ClothingApparel End

    // homeDailydeals Start
    public function gethomeDailydealsAds($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_ADS . ' a');
        $this->db->where('status', '2');
        $this->db->where('category', 'homeDailydeals');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    // homeDailydeals End
    // homeFashion Start
    public function gethomeFashionAds($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_ADS . ' a');
        $this->db->where('status', '2');
        $this->db->where('category', 'homeFashion');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    // homeFashion End
    // productDetailsRight Start
    public function getproductDetailsRightAds($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_ADS . ' a');
        $this->db->where('status', '2');
        $this->db->where('category', 'productDetailsRight');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    // productDetailsRight End

    public function getAllCategory($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_CATEGORY . ' a');
        //$this->db->join(TBL_PRODUCT.' b','a.id=b.category_id','left');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getAllBrand($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_BRAND . ' a');
        //$this->db->join(TBL_PRODUCT.' b','a.id=b.category_id','left');
        $this->db->order_by('brand', 'ASC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getAllPagesList($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_CONTENT . ' a');
        // $this->db->order_by('id','DESC');
        $this->db->order_by('id', 'ASC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getAllCategories($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_CATEGORY . ' a');
        // $this->db->order_by('id','DESC');
        $this->db->order_by('id', 'ASC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getAllProduct($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        // $this->db->join(TBL_VENDOR_PRODUCT.' b','a.id=b.pid','left');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getrelatedProductFrmSeller($postVal = array())
    {
        $result = array();
        $fields = "a.*,b.shop_name,b.id as seller_id";
        $this->db->select($fields);
        $this->db->from(TBL_VENDOR_PRODUCT . ' a');
        $this->db->join(TBL_SELLER . ' b', 'a.vendor_id=b.id', 'left');
        // $this->db->where(array('a.id !'=>$postVal['pid']));
        $this->db->where(array('a.pid' => $postVal['pid']));
        $this->db->where('b.id !=', $postVal['id']);
        $this->db->order_by('a.price', 'ASC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getRelatedProduct($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where('childcategory_id', $postVal['childcategory_id']);
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getRelatedBrandProduct($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where('brand', $postVal['brand']);
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getDailyDealsProduct($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where('dailydeals', '1');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getHotProduct($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where('hot', '1');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    } 
	public function getNextHotProduct($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where('hot', '1');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
            $this->db->offset($postVal['offset']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
	public function getNextSaleProduct($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where('sale', '1');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
            $this->db->offset($postVal['offset']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getSaleProduct($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where('sale', '1');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    public function getTrendingProduct($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where('trending', '1');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
	public function getNextTrendingProduct($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where('trending', '1');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
            $this->db->offset($postVal['offset']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
	public function getNextAllProduct($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
            $this->db->offset($postVal['offset']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getClothingApparelProduct($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where('category_id', '23');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getfashionProduct($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where('category_id', '23');
        $this->db->where('category_id', '22');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    public function getgroceryProduct($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where('category_id', '29');
        $this->db->order_by('is_discount', 'RANDOM');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }
    public function getBeautyProducts($postVal = array())
        {
            $result = array();
            $fields = "a.*";
            $this->db->select($fields);
            $this->db->from(TBL_PRODUCT . ' a');
            $this->db->where('category_id', '22');
            $this->db->order_by('id', 'RANDOM');
            if (isset($postVal['limit']) && $postVal['limit'] > 0) {
                $this->db->limit($postVal['limit']);
            }
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $result = $query->result_array();
            }
            return $result;
        }

    public function getAllSocialIcons($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_SOCIAL_MEDIA . ' a');
        $this->db->order_by('id_socialmedia', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getProductGalleryR($postVal = array())
    {
        $result = array();
        $this->db->select("a.*");
        $this->db->from(TBL_GALLERY . ' a');
        $this->db->where(array('a.pid' => $postVal['pid']));
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }

        return $result;
    }

    public function getProductbyCat($postVal = array())
    {
        $result = array();
        $this->db->select("a.*");
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where(array('a.category_id' => $postVal['category_id']));
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }

        return $result;
    }

    public function getItemDetailsRows($params = array())
    {
        $fields = "a.slug, a.description, a.name as product_name, a.sku, a.id as product_id,
		 a.status, a.photo, a.size,a.short_details,a.previous_price, a.size_qty, a.size_price, a.weight, a.color, a.price, a.details,a.description,
		  a.policy, a.is_meta, a.meta_tag, a.meta_description, tc.slug as cat_slug, tc.name as cat_name, ts.slug as subcat_slug, ts.name as subcat_name, tci.slug as childcat_slug, tci.name as childcat_name";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->join(TBL_CATEGORY . ' tc', 'a.category_id=tc.id', 'left');
        $this->db->join(TBL_SUBCATEGORY . ' ts', 'a.subcategory_id=ts.id', 'inner');
        $this->db->join(TBL_CHILDCATEGORY . ' tci', 'a.childcategory_id=tci.id', 'inner');
        //$this->db->join(TBL_GALLERY.' tg','a.id=tg.pid','left');
        //$this->db->join(TBL_VENDOR_PRODUCT.' b','a.id=b.pid','inner');
        //set start and limit
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        if (array_key_exists("slug", $params)) {
            $this->db->where('a.slug', $params['slug']);
            //$this->db->order_by('b.price', 'ASC');
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->row_array() : false;
        } else {
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : false;
        }
        //return fetched data
        return $result;
    }

    public function getVendorIDRows($params = array())
    {
        $total = 0;
        $fields = "count(a.vendor_id) as vendorIDfromdetails,a.price,b.*";
        $this->db->select($fields);
        $this->db->from(TBL_VENDOR_PRODUCT . ' a');
        $this->db->join(TBL_PRODUCT . ' b', 'a.pid=b.id', 'left');
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        if (array_key_exists("slug", $params)) {
            $this->db->where('slug', $params['slug']);
            $this->db->order_by('a.price', 'ASC');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['vendorIDfromdetails'];
            }
        } else {
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $total = $row['vendorIDfromdetails'];
            }
        }
        return $total;
    }

    public function getContentPageDetailsRows($params = array())
    {
        $fields = "a.title as page_title, a.id as page_id, a.details";
        $this->db->select($fields);
        $this->db->from(TBL_CONTENT . ' a');
        //set start and limit
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        if (array_key_exists("slug", $params)) {
            $this->db->where('slug', $params['slug']);
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->row_array() : false;
        } else {
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : false;
        }
        //return fetched data
        return $result;
    }

    /*
    public function getRows($id = ''){
    $result = array();
    $fields = "a.*";
    $this->db->select($fields);
    $this->db->from(TBL_PRODUCT.' a');
    $this->db->where('status', '1');
    if($id){
    $this->db->where('id', $id);
    $query = $this->db->get();
    $result = $query->row_array();
    }else{
    $this->db->order_by('name', 'asc');
    $query = $this->db->get();
    $result = $query->result_array();
    }

    // Return fetched data
    return !empty($result)?$result:false;
    }
     */

    public function getRows($id = '')
    {
        $this->db->select('*');
        $this->db->from($this->proTable);
        $this->db->where('status', '1');
        if ($id) {
            $this->db->where('id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $this->db->order_by('name', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }

        // Return fetched data
        return !empty($result) ? $result : false;
    }

    public function getSliderNews($postVal = array())
    {
        $result = array();
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_NEWS . ' a');
        $this->db->order_by('id', 'DESC');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getRelatedNews($postVal = array())
    {
        $result = array();
        $_GET = getDecryptArray($_GET);
        $id = (isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0;
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_NEWS . ' a');
        $this->db->where('id !=', $id);
        $this->db->order_by('id=', 'random');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getLatestNews($postVal = array())
    {
        $result = array();
        $_GET = getDecryptArray($_GET);
        $id = (isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0;
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_NEWS . ' a');
        //$this->db->where('id !=', $id);
        $this->db->order_by('id', 'desc');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getCatNews($postVal = array())
    {
        $result = array();
        //$cat = $_GET['cat'];
        $cat = (isset($_GET['cat']) && $_GET['cat'] > 0) ? $_GET['cat'] : 0;
        $fields = "a.*";
        $this->db->select($fields);
        $this->db->from(TBL_NEWS . ' a');
        $this->db->where('category_id=', $cat);
        $this->db->order_by('id', 'desc');
        if (isset($postVal['limit']) && $postVal['limit'] > 0) {
            $this->db->limit($postVal['limit']);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        }
        return $result;
    }

    public function getNewsDetails($postVal = array())
    {
        $result = array();
        $fields = "a.*,";
        $this->db->select($fields);
        $this->db->from(TBL_NEWS . ' a');
        $this->db->where(array('a.id' => $postVal['id']));
        $this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
        }
        return $result;
    }
    public function getNewsbyCategory($postVal = array())
    {
        $result = array();
        $fields = "a.*,";
        $this->db->select($fields);
        $this->db->from(TBL_NEWS . ' a');
        $this->db->where(array('a.category' => $postVal['category']));
        $this->db->order_by('a.id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
        }
        return $result;
    }

    public function getCatName($postVal = array())
    {
        $result = array();
        $this->db->select('category');
        $this->db->from(TBL_NEWS . '');
        //$this->db->where(array('id'=>$postVal['id']));
        $this->db->where(array('id' => 4320));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
        }
        return $result;
    }

    public function registerUser($postVal = array())
    {
        $response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
        $data = array('first_name' => $postVal['first_name'],
            'last_name' => $postVal['last_name'],
            'mobile_no' => $postVal['mobile_no'],
            'email' => $postVal['email'],
            'gender' => $postVal['gender'],
            'created_at' => getCurrentDateTime(),
        );
        if (isset($postVal['fileDetails']['file_size']) && strlen($postVal['fileDetails']['file_size']) > 0) {
            if (CLDNRY_ACCESS) {
                /*Need to do in local*/
            }
        }
        if ($this->db->insert(TBL_USER, $data)) {
            $response = array('status' => STATUS_SUCCESS, 'msg' => $this->config->item('reg_req_in_process'));
        }
        return $response;
    }

    public function getProductDetails($postVal = array())
    {
        $result = array();
        $fields = "a.*,";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $this->db->where(array('a.id_product' => $postVal['id_product']));
        $this->db->order_by('a.id_product', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
        }
        return $result;
    }

    public function addEmailSubscribe($data)
    {
        $fields = "a.id";
        $this->db->select($fields);
        $this->db->from(TBL_EMAIL_SUBSCRIBE . ' a');
        $this->db->where(array('a.email' => trim($data['email'])));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return 0;
        } else {
            $this->db->insert(TBL_EMAIL_SUBSCRIBE, $data);
            return 1;
        }
    }
//End
}