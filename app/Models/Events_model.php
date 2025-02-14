<?php

namespace App\Models;

class Events_model extends Crud_model {

    protected $table = null;

    function __construct() {
        $this->table = 'events';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $events_table = $this->db->prefixTable('events');
        $users_table = $this->db->prefixTable('users');
        $clients_table = $this->db->prefixTable('clients');

        $today = date("Y-m-d", strtotime(convert_date_local_to_utc(date("Y-m-d"))) + get_timezone_offset());

        $select = "";
        $where = "";
        $id = $this->_get_clean_value($options, "id");
        if ($id) {
            $where .= " AND $events_table.id=$id";
        }

        $start_date_query = "";
        $end_date_query = "";

        $start_date = $this->_get_clean_value($options, "start_date");
        if ($start_date) {
            $start_date_query = " DATE($events_table.start_date)>='$start_date'";
        }

        $order_by = " ORDER BY $events_table.start_date ASC ";

        $reminder_start_date_time = $this->_get_clean_value($options, "reminder_start_date_time");
        if ($reminder_start_date_time) {
            //remove seconds since it'll give reminder only for minutes at most
            $reminder_end_date_time = $this->_get_clean_value($options, "reminder_end_date_time");
            $get_future_events_only = $this->_get_clean_value($options, "get_future_events_only");
            if ($reminder_end_date_time) {
                //to load reminders for next 24 hours only
                $where .= " AND (
                    (CONCAT($events_table.start_date, ' ', $events_table.start_time)>='$reminder_start_date_time' AND CONCAT($events_table.start_date, ' ', $events_table.start_time)<='$reminder_end_date_time') 
                    OR ($events_table.snoozing_time>='$reminder_start_date_time' AND $events_table.snoozing_time<='$reminder_end_date_time') 
                    OR ($events_table.next_recurring_time>='$reminder_start_date_time' AND $events_table.next_recurring_time<='$reminder_end_date_time') 
                ) ";
            } else if ($get_future_events_only) {
                $where .= " AND (
                    (CONCAT($events_table.start_date, ' ', $events_table.start_time)>='$reminder_start_date_time') 
                    OR ($events_table.snoozing_time>='$reminder_start_date_time') 
                    OR ($events_table.next_recurring_time>='$reminder_start_date_time') 
                ) ";

                $order_by = " ORDER BY $events_table.start_date, $events_table.start_time ASC ";
            } else {
                //get all future and missed reminders
                //that means any reminders with status 'new'
                $where .= " AND $events_table.reminder_status='new' ";
            }
        }

        $end_date = $this->_get_clean_value($options, "end_date");
        if ($end_date) {
            $end_date_query = " DATE($events_table.end_date)<='$end_date'";
        }

        if (!$end_date) {
            //when we'll find event by date, we also have to find the recurring events
            $include_recurring = $this->_get_clean_value($options, "include_recurring");
            if ($include_recurring) {
                $where .= " AND (( " . $start_date_query . " AND " . $end_date_query . ") OR $events_table.recurring = 1) ";
            } else if ($start_date_query && $end_date_query) {
                $where .= " AND " . $start_date_query . " AND " . $end_date_query;
            }
        }


        $future_from = $this->_get_clean_value($options, "future_from");
        if ($future_from) {
            $next_recurring_date = " IF(
                $events_table.recurring=1 AND $events_table.start_date<'$today', 
		IF($events_table.repeat_type='years', DATE_ADD($events_table.start_date, INTERVAL TIMESTAMPDIFF(YEAR, $events_table.start_date, '$today')+1 YEAR), 
			IF($events_table.repeat_type='months', DATE_ADD($events_table.start_date, INTERVAL TIMESTAMPDIFF(MONTH, $events_table.start_date, '$today')+1 MONTH), 
                            IF($events_table.repeat_type='weeks', DATE_ADD($events_table.start_date, INTERVAL TIMESTAMPDIFF(WEEK, $events_table.start_date, '$today')+1 WEEK), DATE_ADD($events_table.start_date, INTERVAL TIMESTAMPDIFF(DAY, $events_table.start_date, '$today')+1 DAY))
			)
		), $events_table.start_date) ";
            $select = $next_recurring_date . " AS next_recurring_date, ";

            $where .= " AND (DATE($events_table.start_date)>='$future_from' OR DATE($next_recurring_date)>'$future_from' )";

            $order_by = " ORDER BY next_recurring_date ASC ";
        }

        $recurring = $this->_get_clean_value($options, "recurring");
        if ($recurring) {
            $where .= " AND $events_table.recurring=1";
        }

        $user_id = $this->_get_clean_value($options, "user_id");
        if ($user_id) {
            $where .= $this->_get_share_with_where_sql($user_id, $events_table, $users_table, $options);
        }

        $client_id = $this->_get_clean_value($options, "client_id");
        if ($client_id) {
            $where .= " AND $events_table.client_id=$client_id";
        }

        $task_id = $this->_get_clean_value($options, "task_id");
        if ($task_id) {
            $where .= " AND $events_table.task_id=$task_id";
        }

        $project_id = $this->_get_clean_value($options, "project_id");
        if ($project_id) {
            $where .= " AND $events_table.project_id=$project_id";
        }

        $lead_id = $this->_get_clean_value($options, "lead_id");
        if ($lead_id) {
            $where .= " AND $events_table.lead_id=$lead_id";
        }

        $ticket_id = $this->_get_clean_value($options, "ticket_id");
        if ($ticket_id) {
            $where .= " AND $events_table.ticket_id=$ticket_id";
        }

        $proposal_id = $this->_get_clean_value($options, "proposal_id");
        if ($proposal_id) {
            $where .= " AND $events_table.proposal_id=$proposal_id";
        }

        $contract_id = $this->_get_clean_value($options, "contract_id");
        if ($contract_id) {
            $where .= " AND $events_table.contract_id=$contract_id";
        }

        $subscription_id = $this->_get_clean_value($options, "subscription_id");
        if ($subscription_id) {
            $where .= " AND $events_table.subscription_id=$subscription_id";
        }

        $invoice_id = $this->_get_clean_value($options, "invoice_id");
        if ($invoice_id) {
            $where .= " AND $events_table.invoice_id=$invoice_id";
        }

        $order_id = $this->_get_clean_value($options, "order_id");
        if ($order_id) {
            $where .= " AND $events_table.order_id=$order_id";
        }

        $estimate_id = $this->_get_clean_value($options, "estimate_id");
        if ($estimate_id) {
            $where .= " AND $events_table.estimate_id=$estimate_id";
        }

        $related_user_id = $this->_get_clean_value($options, "related_user_id");
        if ($related_user_id) {
            $where .= " AND $events_table.related_user_id=$related_user_id";
        }

        $reminder_status = $this->_get_clean_value($options, "reminder_status");
        if ($reminder_status) {
            $where .= " AND $events_table.reminder_status='$reminder_status'";
        }

        $type = $this->_get_clean_value($options, "type");
        if ($type && $type !== "all") {
            $where .= " AND $events_table.type='$type'";
        } else if (!$type) {
            //show only events when there has no type provided
            $where .= " AND $events_table.type='event'";
        }

        $label_id = $this->_get_clean_value($options, "label_id");
        if ($label_id) {
            $where .= " AND FIND_IN_SET($label_id, $events_table.labels) ";
        }

        $limit = $this->_get_clean_value($options, "limit");
        $limit = $limit ? $limit : "20000";
        $offset = $this->_get_clean_value($options, "offset");
        $offset = $offset ? $offset : "0";

        $select_labels_data_query = $this->get_labels_data_query();

        $sql = "SELECT $events_table.*, $select
            CONCAT($users_table.first_name, ' ',$users_table.last_name) AS created_by_name, $users_table.image AS created_by_avatar, $clients_table.company_name, $clients_table.is_lead, $select_labels_data_query
        FROM $events_table
        LEFT JOIN $users_table ON $users_table.id = $events_table.created_by
        LEFT JOIN $clients_table ON $clients_table.id = $events_table.client_id    
        WHERE $events_table.deleted=0 $where
        $order_by
        LIMIT $offset, $limit";
        return $this->db->query($sql);
    }

    private function _get_share_with_where_sql($user_id, $events_table, $users_table = null, $options = array()) {
        $where = "";

        $is_client = $this->_get_clean_value($options, "is_client");
        if ($is_client) {
            //client user's can't see the events which has shared with all team members
            $where .= " AND ($events_table.created_by=$user_id 
                OR (FIND_IN_SET('all_contacts', $events_table.share_with))
                OR (FIND_IN_SET('contact:$user_id', $events_table.share_with))
                    )";
        } else {
            //find events where share with the user and his/her team
            $team_ids = $this->_get_clean_value($options, "team_ids");
            $team_search_sql = "";

            //searh for teams
            if ($team_ids) {
                $teams_array = explode(",", $team_ids);
                foreach ($teams_array as $team_id) {
                    $team_search_sql .= " OR (FIND_IN_SET('team:$team_id', $events_table.share_with)) ";
                }
            }

            //searh for user and teams
            $where .= " AND ($events_table.created_by=$user_id 
                OR (FIND_IN_SET('all', $events_table.share_with))
                OR (FIND_IN_SET('member:$user_id', $events_table.share_with))
                $team_search_sql
                    )";
        }

        if ($users_table) {
            $where .= " AND $users_table.deleted=0 AND $users_table.status='active'";
        }

        return $where;
    }

    function count_events_today($options = array()) {

        $events_table = $this->db->prefixTable('events');
        $now = get_my_local_time("Y-m-d");

        $where = "";
        $user_id = $this->_get_clean_value($options, "user_id");
        if ($user_id) {
            $where .= $this->_get_share_with_where_sql($user_id, $events_table, null, $options);
        }

        $sql = "SELECT COUNT($events_table.id) AS total
        FROM $events_table
        WHERE $events_table.deleted=0 AND $events_table.type='event' AND (($events_table.start_date<='$now' AND $events_table.end_date>='$now') OR FIND_IN_SET('$now',$events_table.recurring_dates)) $where";

        return $this->db->query($sql)->getRow()->total;
    }

    function get_label_suggestions() {
        $events_table = $this->db->prefixTable('events');
        $sql = "SELECT GROUP_CONCAT(labels) AS label_groups
        FROM $events_table
        WHERE $events_table.deleted=0";
        return $this->db->query($sql)->getRow()->label_groups;
    }

    function get_no_of_cycles($repeat_type, $no_of_cycles = 0) {
        if ($repeat_type === "days") {
            //for days type repeating, max value can't be more then 365 days
            if (!$no_of_cycles || $no_of_cycles > 365) {
                $no_of_cycles = 365;
            }
        } else if ($repeat_type === "weeks") {
            //for weeks type repeating, max value can't be more then 520 weeks
            if (!$no_of_cycles || $no_of_cycles > 520) {
                $no_of_cycles = 520;
            }
        } else if ($repeat_type === "months") {
            //for months type repeating, max value can't be more then 120 monts
            if (!$no_of_cycles || $no_of_cycles > 120) {
                $no_of_cycles = 120;
            }
        } else if ($repeat_type === "years") {
            //for days type years, max value can't be more then 10 years
            if (!$no_of_cycles || $no_of_cycles > 50) {
                $no_of_cycles = 50;
            }
        }

        return $no_of_cycles;
    }

    private function sort_by_start_date($a, $b) {
        return strtotime($a->start_date) - strtotime($b->start_date);
    }

    function get_upcomming_events($options = array()) {

        //find all event after today
        $today = date("Y-m-d", strtotime(convert_date_local_to_utc(date("Y-m-d H:i:s"))) + get_timezone_offset());
        $limit = get_array_value($options, "limit");

        $options["future_from"] = $today;
        $result = $this->get_details($options)->getResult();

        $final_result = array();
        $has_recurring = false;

        foreach ($result as $data) {

            $data->cycle = 0; //recured to calculate the recurring dates

            if ($data->recurring) {
                $has_recurring = true;

                //include only future date
                if ($data->start_date >= $today) {
                    $final_result[] = clone $data;
                }

                //prepare all rows base on recurring info

                $no_of_cycles = $this->get_no_of_cycles($data->repeat_type, $data->no_of_cycles);

                for ($i = 1; $i <= $no_of_cycles; $i++) {

                    $data->start_date = add_period_to_date($data->start_date, $data->repeat_every, $data->repeat_type);
                    $data->end_date = add_period_to_date($data->end_date, $data->repeat_every, $data->repeat_type);
                    $data->cycle = $i;

                    //include only the rows which start date after today
                    if ($data->start_date >= $today) {
                        $final_result[] = clone $data;
                    }
                }
            } else {
                $final_result[] = $data; //add regulary event
            }
        }


        //if there are recurring events, so we have to re-sort the events and remove extra rows
        if ($has_recurring) {
            usort($final_result, array($this, "sort_by_start_date")); //sort by start date
            $final_result = array_slice($final_result, 0, $limit); //keep only top 10 rows
        }


        return $final_result;
    }

    function get_response_by_users($user_ids_array = array()) {
        $users_table = $this->db->prefixTable('users');
        $user_ids = implode(",", $user_ids_array);
        $user_ids = $this->_get_clean_value($user_ids);

        if ($user_ids) {
            $sql = "SELECT $users_table.id,  $users_table.user_type, $users_table.image, CONCAT($users_table.first_name, ' ',$users_table.last_name) AS member_name FROM $users_table WHERE (FIND_IN_SET($users_table.id, '$user_ids')) AND deleted=0";

            return $this->db->query($sql);
        } else {
            return false;
        }
    }

    function save_event_status($id, $user_id, $status) {
        $events_table = $this->db->prefixTable('events');

        $id = $this->_get_clean_value($id);
        $user_id = $this->_get_clean_value($user_id);

        $new_status = "";
        $old_status = "";

        if ($status == "confirmed") {
            $new_status .= "$events_table.confirmed_by";
            $old_status .= "$events_table.rejected_by";
        } else if ($status == "rejected") {
            $new_status .= "$events_table.rejected_by";
            $old_status .= "$events_table.confirmed_by";
        }

        $sql = "UPDATE $events_table SET $new_status = CONCAT($new_status,',',$user_id), $old_status = REPLACE($old_status,',$user_id','')
                WHERE $events_table.id=$id AND FIND_IN_SET($user_id,$new_status) = 0";

        return $this->db->query($sql);
    }

    function get_integrated_users_with_google_calendar() {
        $settings_table = $this->db->prefixTable('settings');

        $sql = "SELECT $settings_table.setting_name, $settings_table.setting_value FROM $settings_table
                WHERE $settings_table.deleted=0 AND $settings_table.setting_name LIKE '%_integrate_with_google_calendar%' AND $settings_table.setting_value=1";

        return $this->db->query($sql);
    }

    function count_missed_reminders($user_id) {
        $events_table = $this->db->prefixTable('events');
        $local_time = get_my_local_time("Y-m-d H:i") . ":00";

        $user_id = $this->_get_clean_value($user_id);

        //find missed reminders
        $sql = "SELECT COUNT($events_table.id) AS total_reminders
        FROM $events_table
        WHERE $events_table.deleted=0 AND $events_table.created_by=$user_id AND $events_table.reminder_status='new' AND $events_table.type='reminder' 
            AND CONCAT($events_table.start_date, ' ', $events_table.start_time)<'$local_time' 
            AND ($events_table.snoozing_time IS NULL OR $events_table.snoozing_time<'$local_time') 
            AND ($events_table.next_recurring_time IS NULL OR $events_table.next_recurring_time<'$local_time') ";

        $result = $this->db->query($sql);
        if ($result->resultID->num_rows) {
            return $result->getRow()->total_reminders;
        }
    }
}
