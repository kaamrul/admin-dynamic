<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\ActivityLog
 *
 * @property int $id
 * @property int|null $action_by
 * @property string $action Create, Update, Delete
 * @property string $subject Model name
 * @property string $log_time
 * @property string $ip
 * @property string $browser
 * @property string $changes
 * @property string|null $note
 * @property string|null $status
 * @property int $record_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereActionBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereBrowser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereChanges($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereLogTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereUpdatedAt($value)
 */
	class ActivityLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Address
 *
 * @property int $id
 * @property int $user_id
 * @property int $operator_id
 * @property string $street_address
 * @property int|null $post_code
 * @property string|null $latitude
 * @property string|null $longitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $full_address
 * @property-read \App\Models\User $operator
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePostCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreetAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Address withoutTrashed()
 */
	class Address extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Alert
 *
 * @property int $id
 * @property string|null $parent_alert
 * @property int $operator_id
 * @property string $name
 * @property string|null $details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Alert> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Alert> $childrenCategories
 * @property-read int|null $children_categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ClientAlert> $clients
 * @property-read int|null $clients_count
 * @property-read \App\Models\User $operator
 * @property-read Alert|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|Alert newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Alert newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Alert query()
 * @method static \Illuminate\Database\Eloquent\Builder|Alert whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alert whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alert whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alert whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alert whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alert whereParentAlert($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alert whereUpdatedAt($value)
 */
	class Alert extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Attachment
 *
 * @property int $id
 * @property string|null $name
 * @property string $attachment
 * @property int $attachable_id
 * @property string $attachable_type
 * @property string $mime_type
 * @property string $for
 * @property int|null $operator_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $attachable
 * @property-read \App\Models\User|null $operator
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereAttachableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereAttachableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereFor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Attachment whereUpdatedAt($value)
 */
	class Attachment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Booking
 *
 * @property int $id
 * @property int $territory_id
 * @property int $dog_id
 * @property int $session_id
 * @property int|null $product_id
 * @property int $payment_by
 * @property int $operator_id
 * @property int|null $payment_taken_by
 * @property int $is_recurring
 * @property string|null $recurring_end_date
 * @property float $amount
 * @property string $payment_method product/wallet,manual,stripe/online
 * @property string $payment_status Success, Failed, Abundant
 * @property string|null $note
 * @property string|null $payment_metadata store payment related data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking query()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereDogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereIsRecurring($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking wherePaymentBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking wherePaymentMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking wherePaymentTakenBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereRecurringEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUpdatedAt($value)
 */
	class Booking extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BookingDate
 *
 * @property int $id
 * @property int $booking_id
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BookingDate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingDate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingDate query()
 * @method static \Illuminate\Database\Eloquent\Builder|BookingDate whereBookingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingDate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingDate whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingDate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookingDate whereUpdatedAt($value)
 */
	class BookingDate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ClientAlert
 *
 * @property int $id
 * @property int $client_id
 * @property int $alert_id
 * @property int $operator_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Alert $alert
 * @property-read \App\Models\User $operator
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAlert newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAlert newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAlert query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAlert whereAlertId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAlert whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAlert whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAlert whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAlert whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAlert whereUpdatedAt($value)
 */
	class ClientAlert extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Config
 *
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Config newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config query()
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereValue($value)
 */
	class Config extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Document
 *
 * @property int $id
 * @property int $operator_id
 * @property string $type
 * @property string $title
 * @property string $document
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $operator
 * @method static \Illuminate\Database\Eloquent\Builder|Document isActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUpdatedAt($value)
 */
	class Document extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Dog
 *
 * @property int $id
 * @property string $name
 * @property string $breed
 * @property string $dob
 * @property string $color
 * @property string|null $allergies
 * @property string|null $council_tag_number
 * @property string|null $vaccination_date
 * @property int $temperament
 * @property string|null $description
 * @property string|null $image
 * @property int|null $customer_id
 * @property int|null $operator_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Dog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereAllergies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereBreed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereCouncilTagNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereTemperament($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dog whereVaccinationDate($value)
 */
	class Dog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Email
 *
 * @property int $id
 * @property int $operator_id
 * @property string|null $sending_at
 * @property string $subject
 * @property string $message
 * @property string|null $group
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EmailRecipient> $recipients
 * @property-read int|null $recipients_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Email newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email query()
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereSendingAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereUpdatedAt($value)
 */
	class Email extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmailHistory
 *
 * @property int $id
 * @property int $user_id receiver user id
 * @property string $subject
 * @property string $email
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EmailHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailHistory whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailHistory whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailHistory whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailHistory whereUserId($value)
 */
	class EmailHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmailRecipient
 *
 * @property int $id
 * @property int $email_id
 * @property int $user_id
 * @property int $is_sent
 * @property int $try
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Email $email
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|EmailRecipient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailRecipient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailRecipient query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailRecipient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailRecipient whereEmailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailRecipient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailRecipient whereIsSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailRecipient whereTry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailRecipient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailRecipient whereUserId($value)
 */
	class EmailRecipient extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmailTemplate
 *
 * @property int $id
 * @property string $name
 * @property string $key
 * @property string $subject
 * @property string $message
 * @property string|null $shortcodes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereShortcodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailTemplate whereUpdatedAt($value)
 */
	class EmailTemplate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EmergencyContact
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $name
 * @property string|null $address
 * @property string|null $email
 * @property string|null $mobile_number
 * @property string|null $relationship
 * @property string|null $note
 * @property string|null $image
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact whereMobileNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact whereRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EmergencyContact withoutTrashed()
 */
	class EmergencyContact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Faq
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 */
	class Faq extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LoginHistory
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $email
 * @property string|null $password
 * @property string $status
 * @property string|null $ip
 * @property string|null $country
 * @property string|null $region
 * @property string|null $city
 * @property mixed|null $geo_details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory whereGeoDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory whereUserId($value)
 */
	class LoginHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Notification
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $subject
 * @property int $is_for_emp
 * @property int $is_for_member
 * @property string $message
 * @property string $send_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\NotificationRecipient> $recipients
 * @property-read int|null $recipients_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereIsForEmp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereIsForMember($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereSendDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUserId($value)
 */
	class Notification extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NotificationRecipient
 *
 * @property int $id
 * @property int $notification_id
 * @property int $user_id
 * @property int $is_sent
 * @property int $is_try
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Notification $notification
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationRecipient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationRecipient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationRecipient query()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationRecipient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationRecipient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationRecipient whereIsSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationRecipient whereIsTry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationRecipient whereNotificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationRecipient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationRecipient whereUserId($value)
 */
	class NotificationRecipient extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property int $operator_id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string|null $image
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $operator
 * @method static \Illuminate\Database\Eloquent\Builder|Page active()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $group
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $post_type come from enum, blog/news
 * @property string|null $tags
 * @property string|null $short_description
 * @property string $description
 * @property string|null $featured_image
 * @property string|null $link
 * @property int $is_featured
 * @property int $is_active
 * @property int $operator_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $operator
 * @method static \Illuminate\Database\Eloquent\Builder|Post active()
 * @method static \Illuminate\Database\Eloquent\Builder|Post featured()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereFeaturedImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 */
	class Post extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property int $number_of_walks
 * @property float $price
 * @property int $expired_days
 * @property string|null $description
 * @property string|null $image
 * @property int|null $operator_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereExpiredDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNumberOfWalks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Purchase
 *
 * @property int $id
 * @property int $product_id
 * @property int $customer_id
 * @property string $expired_at
 * @property int $payment_by
 * @property int $operator_id
 * @property int|null $payment_taken_by
 * @property string $payment_method product/wallet,manual,stripe/online
 * @property string $payment_status Success, Failed, Abundant
 * @property string|null $note
 * @property string|null $payment_metadata store payment related data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase query()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePaymentBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePaymentMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase wherePaymentTakenBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereUpdatedAt($value)
 */
	class Purchase extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Session
 *
 * @property int $id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property string $start_time
 * @property string $end_time
 * @property int $van_id
 * @property int $operator_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session query()
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereVanId($value)
 */
	class Session extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slider
 *
 * @property int $id
 * @property int $order
 * @property string $title
 * @property int $active
 * @property int $featured
 * @property int $operator_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attachment> $attachments
 * @property-read int|null $attachments_count
 * @property-read mixed $background
 * @property-read \App\Models\User|null $operator
 * @method static \Illuminate\Database\Eloquent\Builder|Slider active()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider featured()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 */
	class Slider extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Territory
 *
 * @property int $id
 * @property string $name
 * @property int $active
 * @property int|null $operator_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Territory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Territory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Territory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Territory whereUpdatedAt($value)
 */
	class Territory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property int|null $org_id
 * @property int $user_id
 * @property string $full_name
 * @property int|null $assign_to_id
 * @property int|null $assign_id
 * @property string $subject
 * @property string $message
 * @property string|null $attachment
 * @property string $department
 * @property string $status
 * @property string $priority
 * @property int $created_by
 * @property string|null $ip
 * @property string|null $location
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TicketAssign|null $assign
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TicketAssign> $assigns
 * @property-read int|null $assigns_count
 * @property-read \App\Models\User|null $createBy
 * @property-read \App\Models\User|null $employee
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TicketReply> $replies
 * @property-read int|null $replies_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ActivityLog> $statusLogs
 * @property-read int|null $status_logs_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereAssignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereAssignToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUserId($value)
 */
	class Ticket extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TicketAssign
 *
 * @property int $id
 * @property int $ticket_id
 * @property int $assigned_by
 * @property string $assigned_by_name
 * @property int $assigned_to
 * @property string $assign_to_name
 * @property string $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TicketReply> $replies
 * @property-read int|null $replies_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAssign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAssign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAssign query()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAssign whereAssignToName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAssign whereAssignedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAssign whereAssignedByName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAssign whereAssignedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAssign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAssign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAssign whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAssign whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketAssign whereUpdatedAt($value)
 */
	class TicketAssign extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TicketReply
 *
 * @property int $id
 * @property int $ticket_id
 * @property int $user_id
 * @property int $ticket_assign_id
 * @property string $user_name
 * @property int $is_admin_reply 0 = Others, 1 = Admin reply
 * @property string $comment
 * @property int|null $solution_time
 * @property string|null $attachment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ticket|null $ticket
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply query()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereIsAdminReply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereSolutionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereTicketAssignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketReply whereUserName($value)
 */
	class TicketReply extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tournament
 *
 * @property-read \App\Models\User|null $operator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-write mixed $end_date
 * @property-write mixed $entry_closed_date
 * @property-write mixed $entry_open_date
 * @property-write mixed $start_date
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament active()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament current()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament end()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament entryOpenClosed()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament featured()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament isActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament notEnd()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tournament upcoming()
 */
	class Tournament extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string $user_type
 * @property string|null $designation comes from DD
 * @property string|null $description
 * @property string $status 1 = PENDING, 2 = ACTIVE, 3 = SUSPENDED
 * @property string|null $avatar
 * @property string|null $driving_license
 * @property int|null $territory_id
 * @property int|null $operator_id
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Address|null $address
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attachment> $attachments
 * @property-read int|null $attachments_count
 * @property-read \App\Models\EmergencyContact|null $emergency
 * @property-read mixed $age
 * @property-read string $avatar_image
 * @property-read mixed $full_address
 * @property-read mixed $full_name
 * @property-read mixed $is_adult
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read User|null $operator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-write mixed $dob
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User active()
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User hasAdminPanelAccess()
 * @method static \Illuminate\Database\Eloquent\Builder|User isMemberType()
 * @method static \Illuminate\Database\Eloquent\Builder|User isSkipper()
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDrivingLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTerritoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutDatabaseUser()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserVan
 *
 * @property int $id
 * @property int $user_id
 * @property int $van_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserVan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserVan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserVan query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserVan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVan whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVan whereVanId($value)
 */
	class UserVan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Wallet
 *
 * @property int $id
 * @property int $customer_id
 * @property int $number_of_walk
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereNumberOfWalk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereUpdatedAt($value)
 */
	class Wallet extends \Eloquent {}
}

