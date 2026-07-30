<?php
// ============================================================
// COMPONENT: CUSTOM TEXT EDITOR
// Reusable WYSIWYG editor with image upload
// Usage: include 'editor/editor.php';
// ============================================================

// Default folder if not set
$editorFolder = isset($editorFolder) ? $editorFolder : 'general';
?>

<!-- Editor Container -->
<div class="editor-container" id="editorContainer_<?= $editorFolder ?>">

    <!-- Toolbar -->
    <div class="editor-toolbar">
        <button type="button" onclick="formatText_<?= $editorFolder ?>('bold')" title="Bold">
            <i class="fas fa-bold"></i>
        </button>
        <button type="button" onclick="formatText_<?= $editorFolder ?>('italic')" title="Italic">
            <i class="fas fa-italic"></i>
        </button>
        <button type="button" onclick="formatText_<?= $editorFolder ?>('underline')" title="Underline">
            <i class="fas fa-underline"></i>
        </button>
        <button type="button" onclick="formatText_<?= $editorFolder ?>('insertUnorderedList')" title="Bullet List">
            <i class="fas fa-list-ul"></i>
        </button>
        <button type="button" onclick="formatText_<?= $editorFolder ?>('insertOrderedList')" title="Numbered List">
            <i class="fas fa-list-ol"></i>
        </button>
        <button type="button" onclick="insertLink_<?= $editorFolder ?>()" title="Insert Link">
            <i class="fas fa-link"></i>
        </button>
        <button type="button" onclick="document.getElementById('imageInput_<?= $editorFolder ?>').click()" title="Insert Image">
            <i class="fas fa-image"></i>
        </button>
    </div>

    <!-- Editable Area -->
    <div
        class="editor-content"
        id="editor_<?= $editorFolder ?>"
        contenteditable="true"
        data-folder="<?= $editorFolder ?>"
    >
        <?= isset($editorContent) ? $editorContent : '' ?>
    </div>

</div>

<!-- Hidden Inputs -->
<input type="hidden" name="<?= isset($editorName) ? $editorName : 'content' ?>" id="hidden_<?= $editorFolder ?>">
<input type="file" id="imageInput_<?= $editorFolder ?>" accept="image/*" style="display:none;">

<!-- Editor Styles -->
<style>
    .editor-container { border:1px solid #dee2e6; border-radius:8px; overflow:hidden; background:#fff; }
    .editor-toolbar { background:#f8f9fa; border-bottom:1px solid #dee2e6; padding:10px; display:flex; gap:6px; flex-wrap:wrap; }
    .editor-toolbar button { background:#fff; border:1px solid #dee2e6; border-radius:5px; padding:6px 12px; cursor:pointer; color:#495057; font-size:14px; transition:all .15s; }
    .editor-toolbar button:hover { background:#e9ecef; border-color:#adb5bd; }
    .editor-toolbar button:active { background:#dee2e6; }
    .editor-content { min-height:250px; padding:16px; outline:none; line-height:1.6; }
    .editor-content:focus { background:#fff; }
    .editor-content p { margin-bottom:12px; }
    .editor-content img { max-width:100%; height:auto; border-radius:6px; margin:8px 0; }
    .editor-content ul, .editor-content ol { padding-left:24px; margin-bottom:12px; }
    .editor-content blockquote { border-left:4px solid #2b7a78; padding-left:16px; margin:12px 0; color:#6c757d; font-style:italic; }
</style>

<!-- Editor Script -->
<script>
    // Text formatting
    function formatText_<?= $editorFolder ?>(command) {
        document.execCommand(command, false, null);
        document.getElementById('editor_<?= $editorFolder ?>').focus();
    }

    // Insert link
    function insertLink_<?= $editorFolder ?>() {
        var url = prompt('Enter URL:');
        if (url) {
            document.execCommand('createLink', false, url);
        }
    }

    // Image upload
    document.getElementById('imageInput_<?= $editorFolder ?>').addEventListener('change', function() {
        var file = this.files[0];
        if (!file) return;

        var formData = new FormData();
        formData.append('image', file);
        formData.append('folder', '<?= $editorFolder ?>');

        fetch('../editor/upload.php', {
            method: 'POST',
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.execCommand('insertImage', false, data.file_url);
                } else {
                    alert('Upload failed: ' + data.error);
                }
            })
            .catch(err => {
                alert('Upload error: ' + err);
            });

        this.value = '';
    });

    // Sync editor content to hidden input before form submit
    document.querySelector('form').addEventListener('submit', function() {
        var html = document.getElementById('editor_<?= $editorFolder ?>').innerHTML;
        document.getElementById('hidden_<?= $editorFolder ?>').value = html;
    });
</script>
