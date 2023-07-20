<?php

namespace App\Main;
use App\Models\Roleadmin;
use Illuminate\Support\Facades\Auth;


class SidebarPanel
{
    public static function elements()
    {
        return [
            'title' => 'Elements',
            'items' => [
                [
                    'elements_avatar' => [
                        'title' => 'Avatar',
                        'route_name' => 'elements/avatar'
                    ],
                    'elements_alert' => [
                        'title' => 'Alert',
                        'route_name' => 'elements/alert'
                    ],
                    'elements_button' => [
                        'title' => 'Button',
                        'route_name' => 'elements/button'
                    ],
                    'elements_button_group' => [
                        'title' => 'Button Group',
                        'route_name' => 'elements/button-group'
                    ],
                    'elements_badge' => [
                        'title' => 'Badge',
                        'route_name' => 'elements/badge'
                    ],
                    'elements_breadcrumb' => [
                        'title' => 'Breadcrumb',
                        'route_name' => 'elements/breadcrumb'
                    ],
                    'elements_card' => [
                        'title' => 'Card',
                        'route_name' => 'elements/card'
                    ],
                    'elements_divider' => [
                        'title' => 'Divider',
                        'route_name' => 'elements/divider'
                    ],
                    'elements_mask' => [
                        'title' => 'Mask',
                        'route_name' => 'elements/mask'
                    ],
                    'elements_progress' => [
                        'title' => 'Progress',
                        'route_name' => 'elements/progress'
                    ],
                    'elements_skeleton' => [
                        'title' => 'Skeleton',
                        'route_name' => 'elements/skeleton'
                    ],
                    'elements_spinner' => [
                        'title' => 'Spinner',
                        'route_name' => 'elements/spinner'
                    ],
                    'elements_tag' => [
                        'title' => 'Tag',
                        'route_name' => 'elements/tag'
                    ],
                    'elements_tooltip' => [
                        'title' => 'Tooltip',
                        'route_name' => 'elements/tooltip'
                    ],
                ],
                [
                    'elements_forms' => [
                        'title' => 'Forms',
                        'route_name' => 'forms/input-text'
                    ],
                    'elements_typography' => [
                        'title' => 'Typography',
                        'route_name' => 'elements/typography'
                    ],
                ]
            ]
        ];
    }

    public static function components()
    {
        return [
            'title' => 'Components',
            'items' => [
                [
                    'components_accordion' => [
                        'title' => 'Accordion',
                        'route_name' => 'components/accordion'
                    ],
                    'components_collapse' => [
                        'title' => 'Collapse',
                        'route_name' => 'components/collapse'
                    ],
                    'components_tab' => [
                        'title' => 'Tab',
                        'route_name' => 'components/tab'
                    ],
                    'components_dropdown' => [
                        'title' => 'Dropdown',
                        'route_name' => 'components/dropdown'
                    ],
                    'components_popover' => [
                        'title' => 'Popover',
                        'route_name' => 'components/popover'
                    ],
                    'components_modal' => [
                        'title' => 'Modal',
                        'route_name' => 'components/modal'
                    ],
                    'components_drawer' => [
                        'title' => 'Drawer',
                        'route_name' => 'components/drawer'
                    ],
                    'components_steps' => [
                        'title' => 'Steps',
                        'route_name' => 'components/steps'
                    ],
                    'components_timeline' => [
                        'title' => 'Timeline',
                        'route_name' => 'components/timeline'
                    ],
                    'components_menu_list' => [
                        'title' => 'Menu List',
                        'route_name' => 'components/menu-list'
                    ],
                    'components_treeview' => [
                        'title' => 'Treeview',
                        'route_name' => 'components/treeview'
                    ],

                ],
                [
                    'components_table' => [
                        'title' => 'Table',
                        'route_name' => 'components/table'
                    ],

                    'components_table_advanced' => [
                        'title' => 'Table Advanced',
                        'route_name' => 'components/table-advanced'
                    ],

                    'components_table_gridjs' => [
                        'title' => 'Table Gridjs',
                        'route_name' => 'components/gridjs'
                    ],
                ],
                [
                    'components_apexchart' => [
                        'title' => 'Apexcharts',
                        'route_name' => 'components/apexchart'
                    ],

                    'components_swiper' => [
                        'title' => 'Swiper',
                        'route_name' => 'components/swiper'
                    ],

                    'components_notification' => [
                        'title' => 'Notification',
                        'route_name' => 'components/notification'
                    ],
                ],
                [
                    'components_extension_clipboard' => [
                        'title' => 'Clipboard',
                        'route_name' => 'components/extension-clipboard'
                    ],
                    'components_extension_persist' => [
                        'title' => 'Persist',
                        'route_name' => 'components/extension-persist'
                    ],
                    'components_extension_monochrome' => [
                        'title' => 'Monochrome Mode',
                        'route_name' => 'components/extension-monochrome'
                    ],
                ],
            ]
        ];
    }

    public static function forms()
    {
        $roleadmin = Roleadmin::select('email','role','status')->where('email' , Auth::user()->email)->first();
        if($roleadmin != null && $roleadmin->role === "Admin" && $roleadmin->status === 1){
            return [
                'title' => 'Forms',
                'items' => [
                    [
                        'forms_user_setting' => [
                            'title' => 'Forms User Setting',
                            'route_name' => 'forms/Usersetting'
                        ],
                        'forms_kategori_kegiatan' =>[
                            'title' => 'Forms add kategori',
                            'route_name' => 'forms/Kategorikegiatan'
                        ],
                        'forms_add_jadwal'=>[
                            'title' => 'Forms Add jadwal',
                            'route_name' => 'forms/Addjadwal'
                        ],
                        'forms_daftar_diksa'=> [
                            'title' => 'Forms Daftar Diksa',
                            'route_name' => 'forms/Daftardiksa'
                        ],
                        'forms_adminuser_setting'=> [
                            'title' => 'Forms Admin User',
                            'route_name' => 'forms/Adminuser'
                        ],
                        'forms_userdetail_setting'=> [
                            'title' => 'Forms User Detail',
                            'route_name' => 'forms/Usertable'
                        ],
                        'forms_buatkartu_diksa'=> [
                            'title' => 'Forms Buat Kartu Diksa',
                            'route_name' => 'forms/Buatkartu'
                        ],
                        'forms_divisi'=> [
                            'title' => 'Forms Divisi',
                            'route_name' => 'forms/divisi'
                        ],
                        'forms_add_vihara'=> [
                            'title' => 'Forms Vihara',
                            'route_name' => 'forms/addvihara'
                        ],
                        'forms_admit_jadwal'=> [
                            'title' => 'Forms Jadwal Sementara',
                            'route_name' => 'forms/Jadwalsementara'
                        ],
                        'forms_filter_diksa'=> [
                            'title' => 'Forms Filter Diksa',
                            'route_name' => 'forms/Filterlaporandiksa'
                        ],
                        'forms_absensi'=> [
                            'title' => 'Forms Absensi',
                            'route_name' => 'forms/Absensi'
                        ],
                        'forms_regisadmin'=> [
                            'title' => 'Forms Regis Administrator',
                            'route_name' => 'forms/RegisAdmin'
                        ],
                        'forms_filterkegiatan' => [
                            'title' => 'Forms Filter Kegiatan',
                            'route_name' => 'forms/Filterkegiatan'
                        ]
                        
                        
                    ]
                ]
            ];
        }else{
            return [
                'title' => 'Forms',
                'items' => [
                    [
                        'forms_user_setting' => [
                            'title' => 'Forms User Setting',
                            'route_name' => 'forms/Usersetting'
                        ],
                        'forms_daftar_diksa'=> [
                            'title' => 'Forms Daftar Diksa',
                            'route_name' => 'forms/Daftardiksa'
                        ],
                        'forms_absensi'=> [
                            'title' => 'Forms Absensi',
                            'route_name' => 'forms/Absensi'
                        ]
                    ]
                ]
            ];
        }
    }

    public static function layouts()
    {
        
        $roleadmin = Roleadmin::select('email','role')->where('email' , Auth::user()->email)->first();
        
        if($roleadmin != null && $roleadmin->role === "Admin"){
            return [
                'title' => 'Layouts',
                'items' => [
                    [
                                'layouts_jadwalkegiatan' => [
                                    'title' => 'Cek Kegiatan',
                                    'route_name' => 'layouts/Lihatjadwal'
                                ]
                    ]
                ]
                ];
        }else{
            return [
                'title' => 'Layouts',
                'items' => [
                    [
                                'layouts_jadwalkegiatan' => [
                                    'title' => 'Cek Kegiatan',
                                    'route_name' => 'layouts/Lihatjadwal'
                                ]
                                
                                
                    ]
                ]
             ];
        };
    }

    public static function apps()
    {
        return [
            'title' => 'Applications',
            'items' => [
                [
                    'apps_chat' => [
                        'title' => 'Chat App',
                        'route_name' => 'apps/chat'
                    ],
                    'apps_kanban' => [
                        'title' => 'Kanban Board',
                        'route_name' => 'apps/kanban'
                    ],
                    'apps_filemanager' => [
                        'title' => 'File Manager',
                        'route_name' => 'apps/filemanager'
                    ],
                    'apps_mail' => [
                        'title' => 'Mail App',
                        'route_name' => 'apps/mail'
                    ],
                    'apps_todo' => [
                        'title' => 'Todo App',
                        'route_name' => 'apps/todo'
                    ],
                ],
                [
                    'apps_nft_1' => [
                        'title' => 'NFT Apps v1',
                        'route_name' => 'apps/nft1'
                    ],
                    'apps_nft_2' => [
                        'title' => 'NFT Apps v2',
                        'route_name' => 'apps/nft2'
                    ],
                    'apps_pos' => [
                        'title' => 'POS System',
                        'route_name' => 'apps/pos'
                    ],
                    'apps_travel' => [
                        'title' => 'Travel App',
                        'route_name' => 'apps/travel'
                    ]
                ],
            ]
        ];
    }

    public static function dashboards()
    {
        return [
            'title' => 'Dashboards',
            'items' => [
                [
                    
                    'dashboards_pandita' => [
                        'title' => 'Pandita',
                        'route_name' => 'dashboards/pandita'
                    ],
                ],
                [
                    'dashboards_user' => [
                        'title' => 'User',
                        'route_name' => 'dashboards/user'
                    ]
                ]
            ]
        ];
    }

    public static function userdashboards(){
        return [
            'title' => 'UserDashboard',
            'items' => [
                [
                    'dashboards_teacher' => [
                        'title' => 'Pandita',
                        'route_name' => 'userdashboards/user'
                    ],
                ]
            ]
        ];
    }
}
