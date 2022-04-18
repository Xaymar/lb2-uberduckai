# Uberduck.AI for LioranBoard 2
With Uberduck.AI it is possible to generate custom trained voices, and now it's available directly in LioranBoard 2! All you need is a Uberduck.AI account, some time and creativity, and your stream will level up. And a web server of some kind if you don't trust mine.

## Important Information & Privacy concerns
- Because `file://` results in an `Origin` of `null`, a proxy request is made to a hosted script to bypass the CORS problem. See `cors_proxy.php` for the implementation of the proxy script, which is what the extension defaults to. You should host this script locally using XAMPP or similar solutions.

## Installation
1. Downlaod the `.lb2` extension and install it into the Transmitter.
2. Sign up or log in to Uberduck.AI, then [generate an API Key and Secret](https://app.uberduck.ai/account/manage).
3. Copy & Paste the API Key and Secret into the UberduckAI settings in the Transmitter.
4. Done.

## Usage
The Uberduck.AI integration is asynchronous and as such requires the combination of two Buttons, one which is triggered by the extension trigger specified below.

### Example Deck
```
{ "deck_data": "{ \"background_color\": 4210752.0, \"on\": 1.0, \"grid_y\": 4.0, \"snap_grid\": true, \"lb_version\": \"2.07.9\", \"background_image\": \"\", \"encrypted\": false, \"adaptive_resizing\": true, \"unique_id\": \"20220417230844770401421\", \"button_list\": [ { \"color\": 12632256.0, \"persistent\": 1.0, \"text\": \"Uberduck\\nPt1\", \"release_duration\": 0.0, \"queueable\": 0.0, \"command_list\": [ { \"text\": \"Hey there!\", \"cmd\": 0.0, \"obsid\": \"Main\", \"pos\": 0.0, \"vis\": 1.0, \"ms\": 0.0, \"variable\": \"\", \"sel\": 0.0, \"dis\": 0.0, \"xpan\": 29.0, \"extcmd\": \"UberduckAI Speak\", \"voice\": \"scout\", \"pace\": 0.12299999999999999822364316059975, \"ext\": \"Transmitter\" }, { \"b1\": \"0\", \"cmd\": 132.0, \"obsid\": \"Main\", \"pos\": 1.0, \"vis\": 1.0, \"ms\": 1000.0, \"sel\": 0.0, \"dis\": 0.0, \"xpan\": 0.0, \"b0\": \"ID3\", \"v0\": false } ], \"press_type\": 0.0, \"x\": 0.0, \"border\": 2.0, \"image\": \"\", \"triggers\": [ ], \"group_id\": \"\", \"overlappable\": 0.0, \"init_variable\": \"\", \"deck\": 0.0, \"width\": 1.0, \"button_id\": \"ID1\", \"button_duration\": 1000.0, \"y\": 0.0, \"switch_deck\": \"\", \"height\": 0.25, \"release_list\": [ ], \"functions\": 65.0, \"stretch\": 0.0 }, { \"color\": 12632256.0, \"persistent\": 1.0, \"text\": \"Uberduck\\nReady\", \"release_duration\": 0.0, \"queueable\": 1.0, \"command_list\": [ { \"b1\": \"data\", \"cmd\": 66.0, \"obsid\": \"Main\", \"pos\": 0.0, \"vis\": 1.0, \"ms\": 0.0, \"sel\": 0.0, \"dis\": 0.0, \"xpan\": 0.0, \"b0\": \"data\" }, { \"cmd\": 109.0, \"obsid\": \"Main\", \"pos\": 1.0, \"vis\": 1.0, \"ms\": 0.0, \"sel\": 0.0, \"dis\": 0.0, \"xpan\": 0.0, \"b0\": \"bata\" }, { \"b1\": \"\\\/$data$\\\/\", \"cmd\": 118.0, \"obsid\": \"Main\", \"pos\": 2.0, \"vis\": 1.0, \"ms\": 0.0, \"sel\": 0.0, \"dis\": 0.0, \"xpan\": 0.0, \"b0\": \"bata\" }, { \"b1\": \"\\\/$global.main_directory$\\\/\\\\test.wav\", \"cmd\": 111.0, \"obsid\": \"Main\", \"pos\": 3.0, \"vis\": 1.0, \"ms\": 0.0, \"sel\": 0.0, \"dis\": 0.0, \"xpan\": 0.0, \"b0\": \"bata\" }, { \"b1\": \"{\\\"local_file\\\":\\\"\\\/$global.main_directory$\\\/\\\/test.wav\\\"}\", \"cmd\": 34.0, \"obsid\": \"Main\", \"pos\": 4.0, \"vis\": 1.0, \"ms\": 0.0, \"sel\": 0.0, \"dis\": 0.0, \"xpan\": 0.0, \"b0\": \"Text to Speech\" }, { \"b1\": \"Text to Speech\", \"cmd\": 30.0, \"obsid\": \"Main\", \"pos\": 5.0, \"vis\": 1.0, \"ms\": 100.0, \"sel\": 0.0, \"dis\": 0.0, \"xpan\": 0.0, \"b0\": \"Scene\", \"v0\": true }, { \"b1\": \"Text to Speech\", \"cmd\": 30.0, \"obsid\": \"Main\", \"pos\": 6.0, \"vis\": 1.0, \"ms\": 3000.0, \"sel\": 0.0, \"dis\": 0.0, \"xpan\": 0.0, \"b0\": \"Scene\", \"v0\": false } ], \"press_type\": 0.0, \"x\": 0.0, \"border\": 2.0, \"image\": \"\", \"triggers\": [ { \"case_sensitive\": 0.0, \"message\": \"UberduckAI Success\", \"group_id\": \"\", \"button_id\": \"ID2\", \"trg\": 12.0, \"allow_empty_wildcard\": 0.0 } ], \"group_id\": \"\", \"overlappable\": 0.0, \"init_variable\": \"\", \"deck\": 0.0, \"width\": 1.0, \"button_id\": \"ID2\", \"button_duration\": 3000.0, \"y\": 0.75, \"switch_deck\": \"\", \"height\": 0.25, \"release_list\": [ ], \"functions\": 209.0, \"stretch\": 0.0 }, { \"color\": 12632256.0, \"persistent\": 1.0, \"text\": \"Uberduck\\nPt2\", \"release_duration\": 0.0, \"queueable\": 0.0, \"command_list\": [ { \"text\": \"This is an example of uberduck.\", \"cmd\": 0.0, \"obsid\": \"Main\", \"pos\": 0.0, \"vis\": 1.0, \"ms\": 0.0, \"variable\": \"\", \"sel\": 0.0, \"dis\": 0.0, \"xpan\": 29.0, \"extcmd\": \"UberduckAI Speak\", \"voice\": \"soldier\", \"pace\": 0.12299999999999999822364316059975, \"ext\": \"Transmitter\" }, { \"b1\": \"0\", \"cmd\": 132.0, \"obsid\": \"Main\", \"pos\": 1.0, \"vis\": 1.0, \"ms\": 3000.0, \"sel\": 0.0, \"dis\": 0.0, \"xpan\": 0.0, \"b0\": \"ID4\", \"v0\": false } ], \"press_type\": 0.0, \"x\": 0.0, \"border\": 2.0, \"image\": \"\", \"triggers\": [ ], \"group_id\": \"\", \"overlappable\": 0.0, \"init_variable\": \"\", \"deck\": 0.0, \"width\": 1.0, \"button_id\": \"ID3\", \"button_duration\": 3000.0, \"y\": 0.25, \"switch_deck\": \"\", \"height\": 0.25, \"release_list\": [ ], \"functions\": 65.0, \"stretch\": false }, { \"color\": 12632256.0, \"persistent\": 1.0, \"text\": \"Uberduck\\nPt3\", \"release_duration\": 0.0, \"queueable\": 0.0, \"command_list\": [ { \"text\": \"All of this is generated live.\", \"cmd\": 0.0, \"obsid\": \"Main\", \"pos\": 0.0, \"vis\": 1.0, \"ms\": 0.0, \"variable\": \"\", \"sel\": 0.0, \"dis\": 0.0, \"xpan\": 29.0, \"extcmd\": \"UberduckAI Speak\", \"voice\": \"spy\", \"pace\": 0.12299999999999999822364316059975, \"ext\": \"Transmitter\" } ], \"press_type\": 0.0, \"x\": 0.0, \"border\": 2.0, \"image\": \"\", \"triggers\": [ ], \"group_id\": \"\", \"overlappable\": 0.0, \"init_variable\": \"\", \"deck\": 0.0, \"width\": 1.0, \"button_id\": \"ID4\", \"button_duration\": 0.0, \"y\": 0.5, \"switch_deck\": \"\", \"height\": 0.25, \"release_list\": [ ], \"functions\": 65.0, \"stretch\": false } ], \"deck_name\": \"Deck 1\", \"grid_x\": 4.0, \"stretch\": 0.0 }", "unique_id": "20220417230844770401421", "deck_verification_code": "4d7684075edade98a3626ff66ec6e609efc5db7b", "include_image": { } }
```

### Settings
#### API Key
The API Key used for authorization. Required for working operation.

#### API Secret
The API Secret used for authorization. Required for working operation.

#### CORS Proxy
The CORS Proxy address used to bypass CORS restrictions on `file://` origins.

### Command: `UberduckAI Speak`
Enqueue a new speech synthesis request to the Uberduck.AI API, with the following parameters:

* Text (`text`): The text to use for speech synthesis.
* Voice (`voice`): The voice model to use.

### Trigger: `UberduckAI Failure`
Triggered when a previous `UberduckAI Speak` failed to complete.

```js
{
    // The unique identifier as returned by Uberduck.AI's API.
    "uuid": "...",
    // The text that is supposed to be spoken.
    "text": "...",
    // Voice used for speech synthesis.
    "voice": "...",
}
```

### Trigger: `UberduckAI Pending`
Triggered when a previous `UberduckAI Speak` was successfully enqueued to the API.

```js
{
    // The unique identifier as returned by Uberduck.AI's API.
    "uuid": "...",
    // The text that is supposed to be spoken.
    "text": "...",
    // Voice used for speech synthesis.
    "voice": "...",
}
```

### Trigger: `UberduckAI Loading`
Triggered when a previous `UberduckAI Speak` was processed and is now downloading.

```js
{
    // The unique identifier as returned by Uberduck.AI's API.
    "uuid": "...",
    // The text that is supposed to be spoken.
    "text": "...",
    // Voice used for speech synthesis.
    "voice": "...",
}
```

### Trigger: `UberduckAI Success`
Triggered when a previous `UberduckAI Speak` successfully completed.

```js
{
    // The unique identifier as returned by Uberduck.AI's API.
    "uuid": "...",
    // The text that is supposed to be spoken.
    "text": "...",
    // Voice used for speech synthesis.
    "voice": "...",
    // URL at which the synthesized file can be found temporarily.
    "url": "...",
}
```